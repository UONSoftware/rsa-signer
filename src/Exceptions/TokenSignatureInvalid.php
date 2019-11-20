<?php


namespace UonSoftware\RsaSigner\Exceptions;

use Exception;
use Throwable;


class TokenSignatureInvalid extends Exception
{
    public function __construct($message = 'Signature is invalid', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
