<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Market;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class Time
 *
 * @author Benjamin Franke
 */
class Time implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $iso;
    private $epoch;

    public function getIso(): ?string {
        return $this->iso;
    }

    private function setIso(?string $iso): self {
        $this->iso = $iso;
        return $this;
    }

    public function getEpoch(): ?float {
        return $this->epoch;
    }

    private function setEpoch(?float $epoch): self {
        $this->epoch = $epoch;
        return $this;
    }

}
