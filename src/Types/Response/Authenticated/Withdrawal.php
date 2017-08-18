<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class Withdrawal
 *
 * @author Benjamin Franke
 */
class Withdrawal implements ResponseTypeInterface {

    use ResponseTypeTrait;

    protected $id;
    protected $amount;
    protected $currency;
    protected $coinbase_account_id;
    protected $crypto_address;
    protected $payout_at;

    public function getId(): ?string {
        return $this->id;
    }

    protected function setId(?string $id): self {
        $this->id = $id;
        return $this;
    }

    public function getAmount(): ?string {
        return $this->amount;
    }

    protected function setAmount(?string $amount): self {
        $this->amount = $amount;
        return $this;
    }

    public function getCurrency(): ?string {
        return $this->currency;
    }

    protected function setCurrency(?string $currency): self {
        $this->currency = $currency;
        return $this;
    }

    public function getCoinbaseAccountId(): ?string {
        return $this->coinbase_account_id;
    }

    protected function setCoinbaseAccountId(?string $coinbase_account_id): self {
        $this->coinbase_account_id = $coinbase_account_id;
        return $this;
    }

    public function getCryptoAddress(): ?string {
        return $this->crypto_address;
    }

    protected function setCryptoAddress(?string $crypto_address): self {
        $this->crypto_address = $crypto_address;
        return $this;
    }

    public function getPayoutAt(): ?\DateTime {
        return $this->payout_at;
    }

    protected function setPayoutAt(string $payout_at): self {

        if ($payout_at === null) {
            return $this;
        }

        $this->payout_at = new \DateTime($payout_at);
        return $this;

    }

}
