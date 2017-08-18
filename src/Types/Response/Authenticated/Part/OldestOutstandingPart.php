<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated\Part;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class OldestOutstandingPart
 *
 * @author Benjamin Franke
 */
class OldestOutstandingPart implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $id;
    private $order_id;
    private $created_at;
    private $currency;
    private $account_id;
    private $amount;

    public function getId(): ?string {
        return $this->id;
    }

    private function setId(?string $id): self {
        $this->id = $id;
        return $this;
    }

    public function getOrderId(): ?string {
        return $this->order_id;
    }

    private function setOrderId(?string $order_id): self {
        $this->order_id = $order_id;
        return $this;
    }

    public function getCreatedAt(): ?\DateTime {
        return $this->created_at;
    }

    private function setCreatedAt(?string $created_at): self {

        if ($created_at === null) {
            return $this;
        }

        $this->created_at = new \DateTime($created_at);
        return $this;

    }

    public function getCurrency(): ?string {
        return $this->currency;
    }

    private function setCurrency(?string $currency): self {
        $this->currency = $currency;
        return $this;
    }

    public function getAccountId(): ?string {
        return $this->account_id;
    }

    private function setAccountId(?string $account_id): self {
        $this->account_id = $account_id;
        return $this;
    }

    public function getAmount(): ?string {
        return $this->amount;
    }

    private function setAmount(?string $amount): self {
        $this->amount = $amount;
        return $this;
    }

}
