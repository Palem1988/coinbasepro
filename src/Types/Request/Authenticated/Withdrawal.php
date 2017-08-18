<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Request\Authenticated;

use CoinbasePro\Interfaces\RequestTypeInterface;
use CoinbasePro\Traits\RequestTypeTrait;
use CoinbasePro\Traits\ValidatorTrait;
use CoinbasePro\Utilities\CoinbaseProConstants;

/**
 * Class Withdrawal
 *
 * @author Benjamin Franke
 */
class Withdrawal implements RequestTypeInterface {

    use RequestTypeTrait;
    use ValidatorTrait;

    private $amount;
    private $currency;
    private $payment_method_id;
    private $coinbase_account_id;
    private $crypto_address;

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

    public function getPaymentMethodId(): ?string {
        return $this->payment_method_id;
    }

    public function setPaymentMethodId(string $payment_method_id): self {
        $this->payment_method_id = $payment_method_id;
        return $this;
    }

    public function getCoinbaseAccountId(): ?string {
        return $this->coinbase_account_id;
    }

    public function setCoinbaseAccountId(string $coinbase_account_id): self {
        $this->coinbase_account_id = $coinbase_account_id;
        return $this;
    }

    public function getCryptoAddress(): ?string {
        return $this->crypto_address;
    }

    public function setCryptoAddress(string $crypto_address): self {
        $this->crypto_address = $crypto_address;
        return $this;
    }

}
