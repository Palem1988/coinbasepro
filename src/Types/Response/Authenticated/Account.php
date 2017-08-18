<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class Account
 *
 * @author Benjamin Franke
 */
class Account implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $id;
    private $currency;
    private $balance;
    private $available;
    private $hold;
    private $profile_id;

    public function getId(): ?string {
        return $this->id;
    }

    private function setId(?string $id): self {
        $this->id = $id;
        return $this;
    }

    public function getCurrency(): ?string {
        return $this->currency;
    }

    private function setCurrency(?string $currency): self {
        $this->currency = $currency;
        return $this;
    }

    public function getBalance(): ?string {
        return $this->balance;
    }

    private function setBalance(?string $balance): self {
        $this->balance = $balance;
        return $this;
    }

    public function getAvailable(): ?string {
        return $this->available;
    }

    private function setAvailable(?string $available): self {
        $this->available = $available;
        return $this;
    }

    public function getHold(): ?string {
        return $this->hold;
    }

    private function setHold(?string $hold): self {
        $this->hold = $hold;
        return $this;
    }

    public function getProfileId(): ?string {
        return $this->profile_id;
    }

    private function setProfileId(?string $profile_id): self {
        $this->profile_id = $profile_id;
        return $this;
    }

}
