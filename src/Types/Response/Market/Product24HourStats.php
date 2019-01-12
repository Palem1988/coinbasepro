<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Market;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class Product24HourStats
 *
 * @author Benjamin Franke
 */
class Product24HourStats implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $open;
    private $high;
    private $low;
    private $volume;
    private $last;
    private $volume_30day;

    public function getOpen(): ?string {
        return $this->open;
    }

    private function setOpen(?string $open): self {
        $this->open = $open;
        return $this;
    }

    public function getHigh(): ?string {
        return $this->high;
    }

    private function setHigh(?string $high): self {
        $this->high = $high;
        return $this;
    }

    public function getLow(): ?string {
        return $this->low;
    }

    private function setLow(?string $low): self {
        $this->low = $low;
        return $this;
    }

    public function getVolume(): ?string {
        return $this->volume;
    }

    private function setVolume(?string $volume): self {
        $this->volume = $volume;
        return $this;
    }

    public function getLast(): ?string {
        return $this->last;
    }

    private function setLast(?string $last): self {
        $this->last = $last;
        return $this;
    }

    public function getVolume30day(): ?string {
        return $this->volume_30day;
    }

    private function setVolume30day(?string $volume_30day): self {
        $this->volume_30day = $volume_30day;
        return $this;
    }

}
