<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class Order
 *
 * @author Benjamin Franke
 */
class Order implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $id;
    private $client_oid;
    private $price;
    private $size;
    private $funds;
    private $product_id;
    private $side;
    private $stp;
    private $type;
    private $time_in_force;
    private $expire_time;
    private $cancel_after;
    private $post_only;
    private $created_at;
    private $fill_fees;
    private $filled_size;
    private $executed_value;
    private $overdraft_enabled;
    private $funding_amount;
    private $status;
    private $settled;
    private $specified_funds;
    private $reject_reason;
    private $done_at;
    private $done_reason;
    private $stop;
    private $stop_price;

    public function getId(): ?string {
        return $this->id;
    }

    private function setId(?string $id): self {
        $this->id = $id;
        return $this;
    }

    public function getClientOid(): ?string {
        return $this->client_oid;
    }

    private function setClientOid(?string $client_oid): self {
        $this->client_oid = $client_oid;
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

    public function getProductId(): ?string {
        return $this->product_id;
    }

    private function setProductId(?string $product_id): self {
        $this->product_id = $product_id;
        return $this;
    }

    public function getSide(): ?string {
        return $this->side;
    }

    private function setSide(?string $side): self {
        $this->side = $side;
        return $this;
    }

    public function getStp(): ?string {
        return $this->stp;
    }

    private function setStp(?string $stp): self {
        $this->stp = $stp;
        return $this;
    }

    public function getType(): string {
        return $this->type;
    }

    private function setType(?string $type): self {
        $this->type = $type;
        return $this;
    }

    public function getTimeInForce(): ?string {
        return $this->time_in_force;
    }

    private function setTimeInForce(?string $time_in_force): self {
        $this->time_in_force = $time_in_force;
        return $this;
    }

    public function getExpireTime(): ?\DateTime {
        return $this->expire_time;
    }

    public function setExpireTime(?string $expire_time): self {

        if ($expire_time === null) {
            return $this;
        }

        $this->expire_time = new \DateTime($expire_time);
        return $this;

    }

    public function getCancelAfter(): ?string {
        return $this->cancel_after;
    }

    private function setCancelAfter(?string $cancel_after): self {
        $this->cancel_after = $cancel_after;
        return $this;
    }

    public function isPostOnly(): ?bool {
        return $this->post_only;
    }

    private function setPostOnly(?bool $post_only): self {
        $this->post_only = $post_only;
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

    public function getFillFees(): ?string {
        return $this->fill_fees;
    }

    private function setFillFees(?string $fill_fees): self {
        $this->fill_fees = $fill_fees;
        return $this;
    }

    public function getFilledSize(): ?string {
        return $this->filled_size;
    }

    private function setFilledSize(?string $filled_size): self {
        $this->filled_size = $filled_size;
        return $this;
    }

    public function getExecutedValue(): ?string {
        return $this->executed_value;
    }

    private function setExecutedValue(?string $executed_value): self {
        $this->executed_value = $executed_value;
        return $this;
    }

    public function getStatus(): ?string {
        return $this->status;
    }

    private function setStatus(?string $status): self {
        $this->status = $status;
        return $this;
    }

    public function isSettled(): ?bool {
        return $this->settled;
    }

    private function setSettled(?bool $settled): self {
        $this->settled = $settled;
        return $this;
    }

    public function getFunds(): ?string {
        return $this->funds;
    }

    private function setFunds(?string $funds): self {
        $this->funds = $funds;
        return $this;
    }

    public function getOverdraftEnabled(): ?bool {
        return $this->overdraft_enabled;
    }

    private function setOverdraftEnabled(?bool $overdraft_enabled): self {
        $this->overdraft_enabled = $overdraft_enabled;
        return $this;
    }

    public function getFundingAmount(): ?string {
        return $this->funding_amount;
    }

    private function setFundingAmount(?string $funding_amount): self {
        $this->funding_amount = $funding_amount;
        return $this;
    }

    public function getSpecifiedFunds(): ?string {
        return $this->specified_funds;
    }

    private function setSpecifiedFunds(?string $specified_funds): self {
        $this->specified_funds = $specified_funds;
        return $this;
    }

    public function getRejectReason(): ?string {
        return $this->reject_reason;
    }

    private function setRejectReason(?string $reject_reason): self {
        $this->reject_reason = $reject_reason;
        return $this;
    }

    public function getDoneAt(): ?\DateTime {
        return $this->done_at;
    }

    private function setDoneAt(?string $done_at): self {

        if ($done_at === null) {
            return $this;
        }

        $this->done_at = new \DateTime($done_at);
        return $this;

    }

    public function getDoneReason(): ?string {
        return $this->done_reason;
    }

    private function setDoneReason(?string $done_reason): self {
        $this->done_reason = $done_reason;
        return $this;
    }

    public function getStop(): ?string {
        return $this->stop;
    }

    private function setStop(?string $stop): self {
        $this->stop = $stop;
        return $this;
    }

    public function getStopPrice(): ?string {
        return $this->stop_price;
    }

    private function setStopPrice(?string $stop_price): self {
        $this->stop_price = $stop_price;
        return $this;
    }

}
