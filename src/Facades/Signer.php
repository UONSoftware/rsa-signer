<?php


namespace UonSoftware\RsaSigner\Facades;


use Illuminate\Support\Facades\Facade;
use UonSoftware\RsaSigner\Contracts\Signer as SignerContract;

class Signer extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return SignerContract::class;
    }
}
