<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Market;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class ProductOrderBook
 *
 * @author Benjamin Franke
 */
class ProductOrderBook implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $sequence;
    private $asks;
    private $bids;

    public function getSequence(): ?string {
        return $this->sequence;
    }

    private function setSequence(?string $sequence): self {
        $this->sequence = $sequence;
        return $this;
    }

    public function getAsks(): ?array {
        return $this->asks;
    }

    private function setAsks(?array $asks): self {
        $this->asks = $asks;
        return $this;
    }

    public function getBids(): ?array {
        return $this->bids;
    }

    private function setBids(?array $bids): self {
        $this->bids = $bids;
        return $this;
    }

}
