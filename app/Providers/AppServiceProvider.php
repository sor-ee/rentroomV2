namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- เพิ่มบรรทัดนี้

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // <-- เพิ่ม 3 บรรทัดนี้ เพื่อบังคับใช้ https บน Server จริง
        if(config('app.env') !== 'local') {
            URL::forceScheme('https');
        }
    }
}