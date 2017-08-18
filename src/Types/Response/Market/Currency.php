<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Market;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class Currency
 *
 * @author Benjamin Franke
 */
class Currency implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $id;
    private $name;
    private $min_size;
    private $status;
    private $convertible_to;
    private $details = [];

    public function getId(): ?string {
        return $this->id;
    }

    private function setId(?string $id): self {
        $this->id = $id;
        return $this;
    }

    public function getName(): ?string {
        return $this->name;
    }

    private function setName(?string $name): self {
        $this->name = $name;
        return $this;
    }

    public function getMinSize(): ?string {
        return $this->min_size;
    }

    private function setMinSize(?string $min_size): self {
        $this->min_size = $min_size;
        return $this;
    }

    public function getStatus(): ?string {
        return $this->status;
    }

    private function setStatus(?string $status): self {
        $this->status = $status;
        return $this;
    }

    public function getConvertibleTo(): ?array {
        return $this->convertible_to;
    }

    private function setConvertibleTo(?array $convertible_to): self {
        $this->convertible_to = $convertible_to;
        return $this;
    }

    public function getDetails(): ?array {
        return $this->details;
    }

    private function setDetails(?array $details): self {
        $this->details = $details;
        return $this;
    }

}
