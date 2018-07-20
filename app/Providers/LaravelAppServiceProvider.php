<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class LaravelAppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //membuat pendeteksi halaman
        $halaman = '';
        if(Request::segment(1) == 'siswa'){
            $halaman = 'siswa';
        }

        if (Request::segment(1) == 'about'){
            $halaman = 'about';
        }

        if (Request::segment(1) == 'kelas') {
            $halaman = 'kelas';
        }

        view()->share('halaman',$halaman);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
