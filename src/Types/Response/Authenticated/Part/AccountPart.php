<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated\Part;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class AccountPart
 *
 * @author Benjamin Franke
 */
class AccountPart implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $id;
    private $currency;
    private $balance;
    private $hold;
    private $funded_amount;
    private $default_amount;

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

    public function getHold(): ?string {
        return $this->hold;
    }

    private function setHold(?string $hold): self {
        $this->hold = $hold;
        return $this;
    }

    public function getFundedAmount(): ?string {
        return $this->funded_amount;
    }

    private function setFundedAmount(?string $funded_amount): self {
        $this->funded_amount = $funded_amount;
        return $this;
    }

    public function getDefaultAmount(): ?string {
        return $this->default_amount;
    }

    private function setDefaultAmount(?string $default_amount): self {
        $this->default_amount = $default_amount;
        return $this;
    }

}
