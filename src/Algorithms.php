<?php


namespace UonSoftware\RsaSigner;


interface Algorithms
{
    public const SHA256 = OPENSSL_ALGO_SHA256;
    public const SHA384 = OPENSSL_ALGO_SHA384;
    public const SHA512 = OPENSSL_ALGO_SHA512;
    public const RMD160 = OPENSSL_ALGO_RMD160;
}
