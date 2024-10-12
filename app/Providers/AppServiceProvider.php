<?php

namespace App\Providers;

use App\EventBuilder\Blocks\ButtonBlock;
use App\EventBuilder\Blocks\HeroBlock;
use App\EventBuilder\Blocks\TextBlock;
use App\EventBuilder\Services\BlocksRegistry;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(BlocksRegistry::class, function () {
            return new BlocksRegistry();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
        $registry = $this->app->make(BlocksRegistry::class);

        $registry->register(
            [
                'text' => TextBlock::class,
                'button' => ButtonBlock::class,
                'hero' => HeroBlock::class
            ]
        );

    }
}
