<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Request\Authenticated;

use CoinbasePro\Interfaces\RequestTypeInterface;
use CoinbasePro\Traits\RequestTypeTrait;

/**
 * Class AccountPaginated
 *
 * @author Benjamin Franke
 */
class AccountPaginated implements RequestTypeInterface {

    use RequestTypeTrait;

    private $id;

    public function getId(): ?string {
        return $this->id;
    }

    public function setId(string $id): self {
        $this->id = $id;
        return $this;
    }

}
