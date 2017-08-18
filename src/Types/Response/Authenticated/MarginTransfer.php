<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class MarginTransfer
 *
 * @author Benjamin Franke
 */
class MarginTransfer implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $created_at;
    private $id;
    private $user_id;
    private $profile_id;
    private $margin_profile_id;
    private $type;
    private $amount;
    private $currency;
    private $account_id;
    private $margin_account_id;
    private $margin_product_id;
    private $status;
    private $nonce;

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

    public function getId(): ?string {
        return $this->id;
    }

    private function setId(?string $id): self {
        $this->id = $id;
        return $this;
    }

    public function getUserId(): ?string {
        return $this->user_id;
    }

    private function setUserId(?string $user_id): self {
        $this->user_id = $user_id;
        return $this;
    }

    public function getProfileId(): ?string {
        return $this->profile_id;
    }

    private function setProfileId(?string $profile_id): self {
        $this->profile_id = $profile_id;
        return $this;
    }

    public function getMarginProfileId(): ?string {
        return $this->margin_profile_id;
    }


    private function setMarginProfileId(?string $margin_profile_id): self {
        $this->margin_profile_id = $margin_profile_id;
        return $this;
    }

    public function getType(): ?string {
        return $this->type;
    }

    private function setType(?string $type): self {
        $this->type = $type;
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

    public function getAccountId(): ?string {
        return $this->account_id;
    }

    private function setAccountId(?string $account_id): self {
        $this->account_id = $account_id;
        return $this;
    }

    public function getMarginAccountId(): ?string {
        return $this->margin_account_id;
    }

    private function setMarginAccountId(?string $margin_account_id): self {
        $this->margin_account_id = $margin_account_id;
        return $this;
    }

    public function getMarginProductId(): ?string {
        return $this->margin_product_id;
    }

    private function setMarginProductId(?string $margin_product_id): self {
        $this->margin_product_id = $margin_product_id;
        return $this;
    }

    public function getStatus(): ?string {
        return $this->status;
    }

    private function setStatus(string $status): self {
        $this->status = $status;
        return $this;
    }

    public function getNonce(): ?string {
        return $this->nonce;
    }

    private function setNonce(?string $nonce): self {
        $this->nonce = $nonce;
        return $this;
    }

}
