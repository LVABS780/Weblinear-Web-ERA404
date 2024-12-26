namespace weblinear_licensing\Licensing\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VerifyLicenseKey
{
    public function handle(Request $request, Closure $next)
    {
        $licenseKey = config('licensing.license_key');

        if (!$licenseKey) {
            return response()->json(['error' => 'License key not found'], 403);
        }

        $response = Http::post(config('licensing.validation_url'), [
            'key' => $licenseKey,
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'License validation failed'], 403);
        }

        return $next($request);
    }
}
