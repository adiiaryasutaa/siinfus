<?php

namespace App\Providers;

use App\Actions\Contracts\CreatesNews;
use App\Actions\Contracts\DeletesNews;
use App\Actions\Contracts\UpdatesNews;
use App\Actions\CreateNews;
use App\Actions\DeleteNews;
use App\Actions\UpdateNews;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        CreatesNews::class => CreateNews::class,
        UpdatesNews::class => UpdateNews::class,
        DeletesNews::class => DeleteNews::class,
    ];

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
        $this->mapBladeComponents();
    }

    /**
     * Map blade components.
     */
    public function mapBladeComponents(): void
    {
        Blade::componentNamespace('App\View\Components\Client', 'client');
        Blade::componentNamespace('App\View\Components\Admin', 'admin');
    }
}
