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
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                 ->prefix('admin')
                ->group(base_path('routes/admin.php'));
            Route::middleware('web')
                ->prefix('clientes')
               ->group(base_path('routes/clientes.php'));
               Route::middleware('web')
               ->prefix('fabricante')
               ->group(base_path('routes/fabricante.php'));

           Route::middleware('web')
               ->prefix('enproduccion')
               ->group(base_path('routes/enproduccion.php'));

           
           Route::middleware('web')
               ->prefix('descripcionproducto')
               ->group(base_path('routes/descripcionproducto.php'));

               
           Route::middleware('web')
                ->prefix('distribucionproducto')
                ->group(base_path('routes/distribucionproducto.php'));




            Route::middleware('web')
               ->prefix('inicio')
               ->group(base_path('routes/inicio.php'));
           Route::middleware('web')
               ->prefix('ventas')
               ->group(base_path('routes/ventas.php'));
           Route::middleware('web')
               ->prefix('compras')
               ->group(base_path('routes/compras.php'));

           Route::middleware('web')
               ->prefix('personas')
               ->group(base_path('routes/personas.php'));  
           

           Route::middleware('web')
               ->prefix('producto')
               ->group(base_path('routes/Producto.php'));

            Route::middleware('web')
               ->prefix('inventario')
               ->group(base_path('routes/Inventario.php')); 
             Route::middleware('web')
               ->prefix('reportes')
               ->group(base_path('routes/reportes.php'));


        });
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
