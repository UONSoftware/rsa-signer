<?php

return [
    'public' => 'file://'.__DIR__.'/public.pem',
    'private' => 'file://'.__DIR__.'/private.pem',
    'password' => env('RSA_PRIVATE_KEY_PASSWORD', null),
];
