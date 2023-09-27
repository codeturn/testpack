<?php
namespace Codeturn\Test\Providers;

use Codeturn\Test\Console\Commands\PostCommand;
use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/posts.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'posts');
//        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/posts'),
        ]);

        $this->publishes([
            __DIR__.'/../config/posts.php' => config_path('posts.php'),
        ]);

        // Console commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                PostCommand::class
            ]);
        }
    }
}
