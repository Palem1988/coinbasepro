<?php declare(strict_types = 1);

namespace CoinbasePro\Security;

/**
 * Class Auth
 *
 * @author Benjamin Franke
 */
class Auth {

    protected $key;
    protected $secret;
    protected $passphrase;

    public function __construct(string $key, string $secret, String $passphrase) {

        $this->setKey($key);
        $this->setSecret($secret);
        $this->setPassphrase($passphrase);

    }

    public function getKey(): string {
        return $this->key;
    }

    private function setKey(string $key): self {
        $this->key = $key;
        return $this;
    }

    public function getSecret(): string {
        return $this->secret;
    }

    private function setSecret(string $secret): self {
        $this->secret = $secret;
        return $this;
    }

    public function getPassphrase(): string {
        return $this->passphrase;
    }

    private function setPassphrase(string $passphrase): self {
        $this->passphrase = $passphrase;
        return $this;
    }

}
