<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated\Part;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class BankCountryPart
 *
 * @author Benjamin Franke
 */
class BankCountryPart implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $code;
    private $name;

    public function getCode(): ?string {
        return $this->code;
    }

    private function setCode(?string $code): self {
        $this->code = $code;
        return $this;
    }

    public function getName(): ?string {
        return $this->name;
    }

    private function setName(?string $name): self {
        $this->name = $name;
        return $this;
    }

}
