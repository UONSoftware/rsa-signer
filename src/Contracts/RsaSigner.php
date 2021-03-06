<?php


namespace UonSoftware\RsaSigner\Contracts;


use UonSoftware\RsaSigner\Exceptions\SignatureCorrupted;

interface RsaSigner
{
    /**
     * @throws SignatureCorrupted
     *
     * @param  int  $algorithm
     *
     * @param  string  $data
     *
     * @return string
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
