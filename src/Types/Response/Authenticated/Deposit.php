<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class Deposit
 *
 * @author Benjamin Franke
 */
class Deposit implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $id;
    private $amount;
    private $currency;
    private $payment_method_id;
    private $coinbase_account_id;
    private $payout_at;

    public function getId(): ?string {
        return $this->id;
    }

    private function setId(?string $id): self {
        $this->id = $id;
        return $this;
    }

    public function getAmount(): ?string {
        return $this->amount;
    }

    private function setAmount(?string $amount): self {
        $this->amount = $amount;
        return $this;
    }

    public function getCurrency(): ?string {
        return $this->currency;
    }

    private function setCurrency(?string $currency): self {
        $this->currency = $currency;
        return $this;
    }

    public function getPaymentMethodId(): ?string {
        return $this->payment_method_id;
    }

    private function setPaymentMethodId(?string $payment_method_id): self {
        $this->payment_method_id = $payment_method_id;
        return $this;
    }

    public function getCoinbaseAccountId(): ?string {
        return $this->coinbase_account_id;
    }

    private function setCoinbaseAccountId(?string $coinbase_account_id): self {
        $this->coinbase_account_id = $coinbase_account_id;
        return $this;
    }

    public function getPayoutAt(): ?\DateTime {
        return $this->payout_at;
    }
    
    private function setPayoutAt(?string $payout_at): self {

        if ($payout_at === null) {
            return $this;
        }

        $this->payout_at = new \DateTime($payout_at);
        return $this;

    }

}
