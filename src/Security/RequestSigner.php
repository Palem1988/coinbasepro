<?php declare(strict_types = 1);

namespace CoinbasePro\Security;

use CoinbasePro\Utilities\CoinbaseProConstants;

/**
 * Class RequestSigner
 *
 * @author Benjamin Franke
 */
class RequestSigner {

    protected $key;
    protected $signature;
    protected $timestamp;
    protected $passphrase;

    public function __construct(Auth $auth, string $method, array $uriParts, array $options = []) {

        $this->setTimestamp(\time());
        $this->setKey($auth->getKey());
        $this->setPassphrase($auth->getPassphrase());

        $data = $this->getTimestamp() . $method . '/' . \implode('/', $uriParts);

        if (!empty($options)) {

            switch ($method) {

                case CoinbaseProConstants::METHOD_POST:

                    $data .= \json_encode($options);
                    break;

                case CoinbaseProConstants::METHOD_GET;

                    $data .= '?' . \http_build_query($options);
                    break;

            }

        }

        $hmac = \hash_hmac('sha256', $data, \base64_decode($auth->getSecret()), true);
        $this->setSignature(\base64_encode($hmac));

    }

    /**
     * @return float|int
     */
    public function getTimestamp() {
        return $this->timestamp;
    }

    private function setTimestamp(int $timestamp): self {
        $this->timestamp = $timestamp;
        return $this;
    }

    public function getHeaders(): array {

        return [
            'CB-ACCESS-KEY'        => $this->getKey(),
            'CB-ACCESS-SIGN'       => $this->getSignature(),
            'CB-ACCESS-TIMESTAMP'  => $this->getTimestamp(),
            'CB-ACCESS-PASSPHRASE' => $this->getPassphrase(),
        ];

    }

    public function getKey(): string {
        return $this->key;
    }

    private function setKey(string $key): self {
        $this->key = $key;
        return $this;
    }

    public function getSignature(): string {
        return $this->signature;
    }

    private function setSignature(string $signature): self {
        $this->signature = $signature;
        return $this;
    }

    public function getPassphrase(): string {
        return $this->passphrase;
    }

    private function setPassphrase(string $passphrase): self {
        $this->passphrase = $passphrase;
        return $this;
    }

    public function getSignatureArray(): array {

        return [
            'signature'  => $this->getSignature(),
            'key'        => $this->getKey(),
            'passphrase' => $this->getPassphrase(),
            'timestamp'  => $this->getTimestamp(),
        ];

    }

}
