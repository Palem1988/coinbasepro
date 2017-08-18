<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated\Part;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class PositionPart
 *
 * @author Benjamin Franke
 */
class PositionPart implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $type;
    private $size;
    private $complement;
    private $max_size;

    public function getType(): ?string {
        return $this->type;
    }

    private function setType(?string $type): self {
        $this->type = $type;
        return $this;
    }

    public function getSize(): ?string {
        return $this->size;
    }

    private function setSize(?string $size): self {
        $this->size = $size;
        return $this;
    }

    public function getComplement(): ?string {
        return $this->complement;
    }

    private function setComplement(?string $complement): self {
        $this->complement = $complement;
        return $this;
    }

    public function getMaxSize(): ?string {
        return $this->max_size;
    }

    private function setMaxSize(?string $max_size): self {
        $this->max_size = $max_size;
        return $this;
    }

}
