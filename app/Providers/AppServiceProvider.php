<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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

        /** Register the softDeletes route macro */
        Route::macro('softDeletes', function ($uri, $controller) {
            /** Soft Delete Route */
            Route::delete($uri, [$controller, 'delete'])->name('softDeletes.delete');

            /** Restore Route  */
            Route::post("$uri/restore", [$controller, 'restore'])->name('softDeletes.restore');

            /** View Soft Deleted Records  */
            Route::get("$uri/trashed", [$controller, 'trashed'])->name('softDeletes.trashed');
        });
    }
}
