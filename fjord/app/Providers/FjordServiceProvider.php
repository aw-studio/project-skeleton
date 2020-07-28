<?php

namespace FjordApp\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class FjordServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRepeatables();
    }

    protected function registerRepeatables()
    {
        foreach (File::files(base_path('fjord/app/Repeatables')) as $file) {
            include $file;
            $classes = get_declared_classes();
            $class = end($classes);

            (new $class)->register();
        }
    }
}
