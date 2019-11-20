<?php


namespace UonSoftware\RsaSigner\Contracts;


use UonSoftware\RsaSigner\Exceptions\SignatureCorrupted;
use UonSoftware\RsaSigner\Exceptions\TokenBadlyFormatted;
use UonSoftware\RsaSigner\Exceptions\TokenSignatureInvalid;

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
