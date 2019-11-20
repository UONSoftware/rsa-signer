<?php


namespace UonSoftware\RsaSigner\Exceptions;

use Error;
use Throwable;


class PublicKeyError extends Error
{
    public function __construct($message = 'Error while opening public key', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
