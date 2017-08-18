<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated\Part;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class MarginCallPart
 *
 * @author Benjamin Franke
 */
class MarginCallPart implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $active;
    private $price;
    private $side;
    private $size;
    private $funds;

    public function isActive(): ?bool {
        return $this->active;
    }

    private function setActive(?bool $active): self {
        $this->active = $active;
        return $this;
    }

    public function getPrice(): ?string {
        return $this->price;
    }

    private function setPrice(?string $price): self {
        $this->price = $price;
        return $this;
    }

    public function getSide(): ?string {
        return $this->side;
    }

    private function setSide(?string $side): self {
        $this->side = $side;
        return $this;
    }

    public function getSize(): ?string {
        return $this->size;
    }

    private function setSize(?string $size): self {
        $this->size = $size;
        return $this;
    }

    public function getFunds(): ?string {
        return $this->funds;
    }

    private function setFunds(?string $funds): self {
        $this->funds = $funds;
        return $this;
    }

}
