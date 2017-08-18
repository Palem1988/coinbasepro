<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Request\Authenticated;

use CoinbasePro\Interfaces\RequestTypeInterface;
use CoinbasePro\Traits\RequestTypeTrait;
use CoinbasePro\Traits\ValidatorTrait;
use CoinbasePro\Utilities\CoinbaseProConstants;

/**
 * Class Funding
 *
 * @author Benjamin Franke
 */
class Funding implements RequestTypeInterface {

    use RequestTypeTrait;
    use ValidatorTrait;

    private $status;
    private $amount;
    private $currency;

    public function getStatus(): ?string {
        return $this->status;
    }

    public function setStatus(string $status): self {

        $this->checkStringInArray($status, CoinbaseProConstants::$fundingStatusValues);
        $this->status = $status;
        return $this;

    }

    public function getAmount(): ?string {
        return $this->amount;
    }

    public function setAmount(string $amount): self {
        $this->amount = $amount;
        return $this;
    }

    public function getCurrency(): ?string {
        return $this->currency;
    }

    public function setCurrency(string $currency): self {

        $this->checkStringInArray($currency, CoinbaseProConstants::$currencyValues);
        $this->currency = $currency;
        return $this;

    }

}
