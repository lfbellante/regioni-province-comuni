<?php

namespace Lfbellante\RegioniProvinceComuni;

use Illuminate\Support\ServiceProvider;

class RegionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/regioni_province_comuni.php' => config_path('regioni_province_comuni.php'),
        ],'regioni');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__ . '/../database/migrations/create_regions_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_regions_table.php'),
        ], 'regioni');

        $this->publishes([
            __DIR__.'/../database/seeders/RegionSeeder.php' => database_path('seeders/RegionSeeder.php')
        ], 'regioni');

    }
}
