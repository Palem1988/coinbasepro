<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class Fill
 *
 * @author Benjamin Franke
 */
class Fill implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $trade_id;
    private $product_id;
    private $price;
    private $size;
    private $order_id;
    private $created_at;
    private $liquidity;
    private $fee;
    private $settled;
    private $side;
    private $user_id;
    private $profile_id;
    private $usd_volume;

    public function getTradeId(): ?string {
        return $this->trade_id;
    }

    private function setTradeId(?string $trade_id): self {
        $this->trade_id = $trade_id;
        return $this;
    }

    public function getProductId(): ?string {
        return $this->product_id;
    }

    private function setProductId(?string $product_id): self {
        $this->product_id = $product_id;
        return $this;
    }

    public function getPrice(): ?string {
        return $this->price;
    }

    private function setPrice(?string $price): self {
        $this->price = $price;
        return $this;
    }

    public function getSize(): ?string {
        return $this->size;
    }

    private function setSize(?string $size): self {
        $this->size = $size;
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

    public function getLiquidity(): ?string {
        return $this->liquidity;
    }

    private function setLiquidity(?string $liquidity): self {
        $this->liquidity = $liquidity;
        return $this;
    }

    public function getFee(): ?string {
        return $this->fee;
    }

    private function setFee(?string $fee): self {
        $this->fee = $fee;
        return $this;
    }

    public function isSettled(): ?bool {
        return $this->settled;
    }

    private function setSettled(?bool $settled): self {
        $this->settled = $settled;
        return $this;
    }

    public function getSide(): ?string {
        return $this->side;
    }

    private function setSide(?string $side): self {
        $this->side = $side;
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

    public function getUsdVolume(): ?string {
        return $this->usd_volume;
    }

    private function setUsdVolume(?string $usd_volume): self {
        $this->usd_volume = $usd_volume;
        return $this;
    }

}
