<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Market;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class ProductTicker
 *
 * @author Benjamin Franke
 */
class ProductTicker implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $trade_id;
    private $price;
    private $size;
    private $bid;
    private $ask;
    private $volume;
    private $time;

    public function getTradeId(): ?int {
        return $this->trade_id;
    }

    private function setTradeId(?int $trade_id): self {
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

    public function getBid(): ?string {
        return $this->bid;
    }

    private function setBid(?string $bid): self {
        $this->bid = $bid;
        return $this;
    }

    public function getAsk(): ?string {
        return $this->ask;
    }

    private function setAsk(?string $ask): self {
        $this->ask = $ask;
        return $this;
    }

    public function getVolume(): ?string {
        return $this->volume;
    }

    private function setVolume(?string $volume): self {
        $this->volume = $volume;
        return $this;
    }

    public function getTime(): ?\DateTime {
        return $this->time;
    }

    private function setTime(?string $time): self {

        if ($time === null) {
            return $this;
        }

        $this->time = new \DateTime($time);
        return $this;

    }

}
