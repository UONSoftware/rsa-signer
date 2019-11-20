<?php


namespace Hob\RsaSigner\Contracts;


use Hob\RsaSigner\Exceptions\SignatureCorrupted;
use Hob\RsaSigner\Exceptions\TokenBadlyFormatted;
use Hob\RsaSigner\Exceptions\TokenSignatureInvalid;

interface RsaSigner
{
    /**
     * @param  string  $data
     * @param  int  $algorithm
     *
     * @return string
     * @throws SignatureCorrupted
     */
    public function sign(string $data, $algorithm = OPENSSL_ALGO_SHA512): string;
    
    
    /**
     * @param  string  $data
     * @param  string  $signature
     * @param  int  $algorithm
     *
     * @return string
     */
    public function verify(string $data, string $signature, $algorithm = OPENSSL_ALGO_SHA512): string;
}
