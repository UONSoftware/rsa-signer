<?php


namespace UonSoftware\RsaSigner\Services;


use UonSoftware\RsaSigner\Exceptions\PublicKeyError;
use UonSoftware\RsaSigner\Exceptions\PrivateKeyError;
use UonSoftware\RsaSigner\Exceptions\SignatureCorrupted;
use UonSoftware\RsaSigner\Exceptions\TokenSignatureInvalid;
use UonSoftware\RsaSigner\Contracts\RsaSigner as Contract;
use Illuminate\Contracts\Config\Repository as Config;

class RsaSigner implements Contract
{
    /**
     * @var false|resource
     */
    private $publicKey;

    /**
     * @var false|resource
     */
    private $privateKey;


    /**
     * RsaSigner constructor.
     * @param Config $config
     * @throws PublicKeyError
     * @throws PrivateKeyError
     */
    public function __construct(Config $config)
    {
        $publicKey = $config->get('rsa.public');
        $privateKey = $config->get('rsa.private');
        $passphrase = $config->get('rsa.passphrase');
        if (!($this->publicKey = openssl_pkey_get_public($publicKey))) {
            throw new PublicKeyError(openssl_error_string());
        }
        if (!($this->privateKey = openssl_pkey_get_private($privateKey, $passphrase))) {
            throw new PrivateKeyError(openssl_error_string());
        }
    }

    /**
     * @param string $data
     * @param int $algorithm
     *
     * @return string
     * @throws SignatureCorrupted
     */
    public function sign(string $data, $algorithm = OPENSSL_ALGO_SHA512): string
    {
        $isSigned = openssl_sign($data, $signature, $this->privateKey, $algorithm);
        if (!$isSigned || !isset($signature)) {
            throw new SignatureCorrupted();
        }
        return bin2hex($signature);
    }

    /**
     * @param string $data
     * @param string $signature
     * @param int $algorithm
     *
     * @return string
     * @throws TokenSignatureInvalid
     */
    public function verify(string $data, string $signature, $algorithm = OPENSSL_ALGO_SHA512): string
    {
        $isValid = openssl_verify($data, hex2bin($signature), $this->publicKey, $algorithm);

        if ($isValid === -1) {
            throw new TokenSignatureInvalid();
        }

        if ($isValid === 0) {
            return null;
        }
        return $signature;
    }
}
