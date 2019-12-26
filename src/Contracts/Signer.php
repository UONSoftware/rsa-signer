<?php


namespace UonSoftware\RsaSigner\Contracts;


use UonSoftware\RsaSigner\Exceptions\SignatureCorrupted;
use UonSoftware\RsaSigner\Exceptions\TokenSignatureInvalid;

interface Signer
{
    /**
     * @throws SignatureCorrupted
     *
     * @param  string  $data
     *
     * @return string
     */
    public function sign(string $data): string;


    /**
     * @throws TokenSignatureInvalid
     *
     * @param  string  $data
     * @param  string  $signature
     *
     * @return string
     */
    public function verify(string $data, string $signature): string;

}
