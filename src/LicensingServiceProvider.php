namespace weblinear_licensing\Licensing;

use Illuminate\Support\ServiceProvider;

class LicensingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__ . '/Config/licensing.php' => config_path('licensing.php'),
        ], 'config');

        // Register routes
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/Config/licensing.php', 'licensing');
    }
}
