<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class TrailingVolume
 *
 * @author Benjamin Franke
 */
class TrailingVolume implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $product_id;
    private $exchange_volume;
    private $volume;
    private $recorded_at;

    public function getProductId(): ?string {
        return $this->product_id;
    }

    private function setProductId(?string $product_id): self {
        $this->product_id = $product_id;
        return $this;
    }

    public function getExchangeVolume(): ?string {
        return $this->exchange_volume;
    }

    private function setExchangeVolume(?string $exchange_volume): self {
        $this->exchange_volume = $exchange_volume;
        return $this;
    }

    public function getVolume(): ?string {
        return $this->volume;
    }

    private function setVolume(?string $volume): self {
        $this->volume = $volume;
        return $this;
    }

    public function getRecordedAt(): ?\DateTime {
        return $this->recorded_at;
    }

    private function setRecordedAt(?string $recorded_at): self {

        if ($recorded_at === null) {
            return $this;
        }

        $this->recorded_at = new \DateTime($recorded_at);
        return $this;

    }

}
