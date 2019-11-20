<?php


namespace Hob\RsaSigner\Exceptions;

use Exception;
use Throwable;


class SignatureCorrupted extends Exception
{
    public function __construct($message = 'Count not create signature', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
