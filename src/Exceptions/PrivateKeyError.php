<?php


namespace UonSoftware\RsaSigner\Exceptions;

use Error;
use Throwable;


class PrivateKeyError extends Error
{
    public function __construct($message = 'Error while opening private key', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
