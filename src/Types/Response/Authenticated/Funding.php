<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class Funding
 *
 * @author Benjamin Franke
 */
class Funding implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $id;
    private $order_id;
    private $profile_id;
    private $amount;
    private $status;
    private $created_at;
    private $currency;
    private $repaid_amount;
    private $default_amount;
    private $repaid_default;

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

    public function getProfileId(): ?string {
        return $this->profile_id;
    }

    private function setProfileId(?string $profile_id): self {
        $this->profile_id = $profile_id;
        return $this;
    }

    public function getAmount(): ?string {
        return $this->amount;
    }

    private function setAmount(?string $amount): self {
        $this->amount = $amount;
        return $this;
    }

    public function getStatus(): ?string {
        return $this->status;
    }

    private function setStatus(?string $status): self {
        $this->status = $status;
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

    public function getRepaidAmount(): ?string {
        return $this->repaid_amount;
    }

    private function setRepaidAmount(?string $repaid_amount): self {
        $this->repaid_amount = $repaid_amount;
        return $this;
    }

    public function getDefaultAmount(): self {
        return $this->default_amount;
    }

    private function setDefaultAmount(?string $default_amount): self {
        $this->default_amount = $default_amount;
        return $this;
    }

    public function isRepaidDefault(): ?bool {
        return $this->repaid_default;
    }

    private function setRepaidDefault(?bool $repaid_default): self {
        $this->repaid_default = $repaid_default;
        return $this;
    }

}
