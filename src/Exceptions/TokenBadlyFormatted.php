<?php


namespace Hob\RsaSigner\Exceptions;

use Exception;
use Throwable;


class TokenBadlyFormatted extends Exception
{
    public function __construct($message = 'Token is not formatted correctly', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
