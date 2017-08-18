<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Request\Authenticated;

use CoinbasePro\Interfaces\RequestTypeInterface;
use CoinbasePro\Traits\RequestTypeTrait;

/**
 * Class Position
 *
 * @author Benjamin Franke
 */
class Position implements RequestTypeInterface {

    use RequestTypeTrait;

    private $repay_only = false;

    public function isRepayOnly(): bool {
        return $this->repay_only;
    }

    public function setRepayOnly(bool $repay_only): self {
        $this->repay_only = $repay_only;
        return $this;
    }

}
