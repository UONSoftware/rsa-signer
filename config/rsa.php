<?php

use UonSoftware\RsaSigner\Algorithms;

return [
    /*
    |--------------------------------------------------------------------------
    | Algorithm
    |--------------------------------------------------------------------------
    |
    | Default algorithm supplied to Signer::class
    |
    */
    'algorithm' => Algorithms::SHA512,

    /*
    |--------------------------------------------------------------------------
    | Public Key
    |--------------------------------------------------------------------------
    |
    | A path or resource to your public key.
    |
    | E.g. 'file://path/to/public/key'
    |
    */
    'public'    => env('RSA_PUBLIC_KEY', 'file://'.__DIR__.'/../keys/public.pem'),

    /*
    |--------------------------------------------------------------------------
    | Private Key
    |--------------------------------------------------------------------------
    |
    | A path or resource to your private key.
    |
    | E.g. 'file://path/to/private/key'
    |
    */
    'private'   => env('RSA_PRIVATE_KEY', 'file://'.__DIR__.'/../keys/private.pem'),

    /*
    |--------------------------------------------------------------------------
    | Passphrase
    |--------------------------------------------------------------------------
    |
    | The passphrase for your private key. Can be null if none set.
    |
    */
    'password'  => env('RSA_PRIVATE_KEY_PASSWORD', null),
];
