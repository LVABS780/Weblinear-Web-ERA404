use Illuminate\Support\Facades\Route;
use YourVendor\Licensing\Http\Controllers\LicenseController;

Route::post('/validate-license', [LicenseController::class, 'validate']);
Route::post('/delete-resources', [LicenseController::class, 'deleteResources']);
