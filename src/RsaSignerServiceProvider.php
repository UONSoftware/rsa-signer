<?php


namespace UonSoftware\RsaSigner;


use Illuminate\Support\ServiceProvider;
use UonSoftware\RsaSigner\Services\RsaSigner;
use Illuminate\Contracts\Foundation\Application;
use UonSoftware\RsaSigner\Services\Signer as SignerService;
use UonSoftware\RsaSigner\Contracts\RsaSigner as RsaContract;
use UonSoftware\RsaSigner\Contracts\Signer as SignerContract;

class RsaSignerServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/rsa.php', 'rsa');
        $this->app->singleton(
            RsaContract::class,
            static function (Application $app) {
                /** @var \Illuminate\Config\Repository $config */
                $config = $app['config'];

                return new RsaSigner(
                    $config->get('rsa.private'),
                    $config->get('rsa.public'),
                    $config->get('rsa.password')
                );
            }
        );

        $this->app->singleton(SignerContract::class, SignerService::class);
    }

    public function boot(): void
    {
        $this->publishes(
            [
                __DIR__.'/../config/rsa.php' => config_path('rsa.php'),
            ]
        );
    }
}
