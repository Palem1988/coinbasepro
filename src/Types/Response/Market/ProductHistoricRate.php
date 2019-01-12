<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Market;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class ProductHistoricRate
 *
 * @author Brandon Eckenrode
 */
class ProductHistoricRate implements ResponseTypeInterface {

    use ResponseTypeTrait {
        initFromArray as private traitInitFromArray;
    }

    private $time;
    private $low;
    private $high;
    private $open;
    private $close;
    private $volume;

    public function getTime(): ?\DateTime {
        return $this->time;
    }

    private function setTime(?int $time): self {

        if ($time === null) {
            return $this;
        }

        $this->time = new \DateTime('@' . $time);
        return $this;

    }

    public function getLow(): ?float {
        return $this->low;
    }

    private function setLow(?float $low): self {
        $this->low = $low;
        return $this;
    }

    public function getHigh(): ?float {
        return $this->high;
    }

    private function setHigh(?float $high): self {
        $this->high = $high;
        return $this;
    }

    public function getOpen(): ?float {
        return $this->open;
    }

    private function setOpen(?float $open): self {
        $this->open = $open;
        return $this;
    }

    public function getClose(): ?float {
        return $this->close;
    }

    private function setClose(?float $close): self {
        $this->close = $close;
        return $this;
    }

    public function getVolume(): ?float {
        return $this->volume;
    }

    private function setVolume(?float $volume): self {
        $this->volume = $volume;
        return $this;
    }

    public function initFromArray(array $data): self {

        return $this->setTime($data[0])
            ->setLow($data[1])
            ->setHigh($data[2])
            ->setOpen($data[3])
            ->setClose($data[4])
            ->setVolume($data[5]);

    }

}
