<?php


namespace UonSoftware\RsaSigner;


use UonSoftware\RsaSigner\Services\RsaSigner;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use UonSoftware\RsaSigner\Contracts\RsaSigner as Contract;

class RsaSignerServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/rsa.php', 'rsa');
        $this->app->singleton(Contract::class, function (Application $app) {

            /** @var \Illuminate\Config\Repository $config */
            $config = $app['config'];
            
            return new RsaSigner(
                $config->get('rsa.private'),
                $config->get('rsa.public'),
                $config->get('rsa.password')
            );
        });
    }
    
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/rsa.php' => config_path('rsa.php'),
        ]);
    }
}
