<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Request\Authenticated;

use CoinbasePro\Interfaces\RequestTypeInterface;
use CoinbasePro\Traits\RequestTypeTrait;

/**
 * Class Account
 *
 * @author Benjamin Franke
 */
class Account implements RequestTypeInterface {

    use RequestTypeTrait;

    private $id;

    public function toPaginated(): AccountPaginated {
        return (new AccountPaginated())->setId($this->getId());
    }

    public function initFromResponseAccount(\CoinbasePro\Types\Response\Authenticated\Account $account): self {
        return $this->setId($account->getId());
    }

    public function getId(): ?string {
        return $this->id;
    }

    public function setId(string $id): self {
        $this->id = $id;
        return $this;
    }

}
