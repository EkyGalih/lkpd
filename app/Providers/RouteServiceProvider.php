<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
    * The path to the "home" route for your application.
    *
    * This is used by Laravel authentication to redirect users after login.
    *
    * @var string
    */
    protected $namespace = 'App\Http\Controllers\Admin';
    public const HOME = '/home';

    /**
    * Define your route model bindings, pattern filters, etc.
    *
    * @return void
    */
    public function boot()
    {
        $this->configureRateLimiting();

        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();

        $this->IkuRealisasiAdmin();
        $this->SasaranStrategisAdmin();
        $this->IndikatorKinerjaAdmin();
        $this->FormulasiAdmin();

        $this->DivisiAdmin();
        $this->RealisasiAnggaranAdmin();
        $this->SaldoAnggaranAdmin();
        $this->NeracaAdmin();
        $this->OperasionalAdmin();
        $this->mapArusKasAdminRoutes();
        $this->EkuitasAdmin();
        $this->AnggaranAdmin();
        $this->ScheduleAdminRoutes();

        $this->KodeRekeningAdmin();
        $this->SubKodeRekeningAdmin();

        // Api routes
        $this->KodeRekeningAdminApi();
        $this->ArusKasAdminApi();
        $this->RealisasiAnggaranAdminApi();
        $this->IkuRealisasiAdminApi();
    }

    public function mapApiRoutes()
    {
        Route::middleware('api')
        ->prefix('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/api.php'));
    }

    public function mapWebRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/web.php'));
    }

    public function IkuRealisasiAdmin()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/iku-realisasi/IkuRealisasi.php'));
    }

    public function SasaranStrategisAdmin()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/iku-realisasi/sasaran-strategis.php'));
    }

    public function IndikatorKinerjaAdmin()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/iku-realisasi/indikator-kinerja.php'));
    }

    public function FormulasiAdmin()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/iku-realisasi/formulasi.php'));
    }

    public function DivisiAdmin()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/Divisi.php'));
    }

    public function mapArusKasAdminRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/ArusKas.php'));
    }

    public function KodeRekeningAdmin()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/KodeRekening.php'));
    }

    public function RealisasiAnggaranAdmin()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/RealisasiAnggaran.php'));
    }

    public function SaldoAnggaranAdmin()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/SaldoAnggaranLebih.php'));
    }

    public function NeracaAdmin()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/Neraca.php'));
    }

    public function OperasionalAdmin()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/Operasional.php'));
    }

    public function EkuitasAdmin()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/Ekuitas.php'));
    }

    public function AnggaranAdmin()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/Anggaran.php'));
    }

    public function ScheduleAdminRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/Schedule.php'));
    }

    // ROUTEST API
    public function KodeRekeningAdminApi()
    {
        Route::middleware('api')
        ->prefix('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/api/KodeRekening.php'));
    }

    public function ArusKasAdminApi()
    {
        Route::middleware('api')
        ->prefix('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/api/ArusKas.php'));
    }

    public function RealisasiAnggaranAdminApi()
    {
        Route::middleware('api')
        ->prefix('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/api/RealisasiAnggaran.php'));
    }

    public function SubKodeRekeningAdmin()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/SubKodeRekening.php'));
    }

    public function IkuRealisasiAdminApi()
    {
        Route::middleware('api')
        ->prefix('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/api/IkuRealisasi.php'));
    }

    /**
    * Configure the rate limiters for the application.
    *
    * @return void
    */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
