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

    private function setTime(?string $time): self {

        if ($time === null) {
            return $this;
        }

        $this->time = new \DateTime('@' . $time);
        return $this;

    }

    public function getLow(): ?string {
        return $this->low;
    }

    private function setLow(?string $low): self {
        $this->low = $low;
        return $this;
    }

    public function getHigh(): ?string {
        return $this->high;
    }

    private function setHigh(?string $high): self {
        $this->high = $high;
        return $this;
    }

    public function getOpen(): ?string {
        return $this->open;
    }

    private function setOpen(?string $open): self {
        $this->open = $open;
        return $this;
    }

    public function getClose(): ?string {
        return $this->close;
    }

    private function setClose(?string $close): self {
        $this->close = $close;
        return $this;
    }

    public function getVolume(): ?string {
        return $this->volume;
    }

    private function setVolume(?string $volume): self {
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
