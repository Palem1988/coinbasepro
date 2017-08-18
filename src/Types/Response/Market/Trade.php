<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Market;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class Trade
 *
 * @author Benjamin Franke
 */
class Trade implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $time;
    private $trade_id;
    private $price;
    private $size;
    private $side;

    public function getTime(): ?\DateTime {
        return $this->time;
    }

    private function setTime(string $time): self {

        if ($time === null) {
            return $this;
        }

        $this->time = new \DateTime($time);
        return $this;

    }

    public function getTradeId(): ?string {
        return $this->trade_id;
    }

    private function setTradeId(?string $trade_id): self {
        $this->trade_id = $trade_id;
        return $this;
    }

    public function getPrice(): ?string {
        return $this->price;
    }

    private function setPrice(?string $price): self {
        $this->price = $price;
        return $this;
    }

    public function getSize(): ?string {
        return $this->size;
    }

    private function setSize(?string $size): self {
        $this->size = $size;
        return $this;
    }

    public function getSide(): ?string {
        return $this->side;
    }

    private function setSide(?string $side): self {
        $this->side = $side;
        return $this;
    }

}
