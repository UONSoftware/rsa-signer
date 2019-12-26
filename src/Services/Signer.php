<?php


namespace UonSoftware\RsaSigner\Services;


use UonSoftware\RsaSigner\Algorithms;
use Illuminate\Config\Repository as Config;
use UonSoftware\RsaSigner\Contracts\RsaSigner;
use UonSoftware\RsaSigner\Contracts\Signer as Contract;

class Signer implements Contract
{
    /**
     * @var integer
     */
    protected $algorithm;

    /**
     * @var \UonSoftware\RsaSigner\Contracts\RsaSigner
     */
    protected $rsaSigner;

    public function __construct(Config $config, RsaSigner $rsaSigner)
    {
        $this->algorithm = $config->get('rsa.algorithm', Algorithms::SHA512);
        $this->rsaSigner = $rsaSigner;
    }

    /**
     * @inheritDoc
     */
    public function sign(string $data): string
    {
        return $this->rsaSigner->sign($data, $this->algorithm);
    }

    /**
     * @inheritDoc
     */
    public function verify(string $data, string $signature): string
    {
        return $this->rsaSigner->verify($data, $signature, $this->algorithm);
    }
}
