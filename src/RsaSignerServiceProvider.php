<?php


namespace UonSoftware\RsaSigner;


use UonSoftware\RsaSigner\Services\RsaSigner;
use Illuminate\Support\ServiceProvider;
use UonSoftware\RsaSigner\Contracts\RsaSigner as Contract;

class RsaSignerServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/rsa.php', 'rsa');
        $this->app->singleton(Contract::class, RsaSigner::class);
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/config/rsa.php' => config_path('rsa.php'),
        ]);
    }
}
