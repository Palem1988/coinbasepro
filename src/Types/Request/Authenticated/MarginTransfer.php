<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Request\Authenticated;

use CoinbasePro\Interfaces\RequestTypeInterface;
use CoinbasePro\Traits\RequestTypeTrait;
use CoinbasePro\Traits\ValidatorTrait;
use CoinbasePro\Utilities\CoinbaseProConstants;

/**
 * Class MarginTransfer
 *
 * @author Benjamin Franke
 */
class MarginTransfer implements RequestTypeInterface {

    use RequestTypeTrait;
    use ValidatorTrait;

    private $margin_profile_id;
    private $type;
    private $currency;
    private $amount;

    public function getMarginProfileId(): ?string {
        return $this->margin_profile_id;
    }

    public function setMarginProfileId(string $margin_profile_id): self {
        $this->margin_profile_id = $margin_profile_id;
        return $this;
    }

    public function getType(): ?string {
        return $this->type;
    }

    public function setType(string $type): self {

        $this->checkStringInArray($type, CoinbaseProConstants::$marginTransferTypeValues);
        $this->type = $type;
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

    public function getAmount(): ?string {
        return $this->amount;
    }

    public function setAmount(string $amount): self {
        $this->amount = $amount;
        return $this;
    }

}
