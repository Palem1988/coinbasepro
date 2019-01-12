<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Request\Authenticated;

use CoinbasePro\Interfaces\RequestTypeInterface;
use CoinbasePro\Traits\RequestTypeTrait;
use CoinbasePro\Traits\ValidatorTrait;
use CoinbasePro\Utilities\CoinbaseProConstants;

/**
 * Class Order
 *
 * @author Benjamin Franke
 */
class Order implements RequestTypeInterface {

    use RequestTypeTrait;
    use ValidatorTrait;

    private $id;
    private $type;
    private $client_oid;
    private $stp;
    private $time_in_force;
    private $size;
    private $price;
    private $side;
    private $product_id;
    private $cancel_after;
    private $funds;
    private $funding_amount;
    private $post_only         = true;
    private $overdraft_enabled = false;

    public function getId(): ?string {
        return $this->id;
    }

    public function setId(string $id): self {
        $this->id = $id;
        return $this;
    }

    public function getType(): ?string {
        return $this->type;
    }

    public function setType(string $type): self {

        $this->checkStringInArray($type, CoinbaseProConstants::$orderTypeValues);
        $this->type = $type;
        return $this;

    }

    public function getSize(): ?float {
        return $this->size;
    }

    public function setSize(float $size): self {
        $this->size = $size;
        return $this;
    }

    public function getPrice(): ?float {
        return $this->price;
    }

    public function setPrice(float $price): self {
        $this->price = $price;
        return $this;
    }

    public function getSide(): ?string {
        return $this->side;
    }

    public function setSide(string $side): self {

        $this->checkStringInArray($side, CoinbaseProConstants::$orderSideValues);
        $this->side = $side;
        return $this;

    }

    public function getProductId(): ?string {
        return $this->product_id;
    }

    public function setProductId(string $product_id): self {

        $this->checkStringInArray($product_id, CoinbaseProConstants::$productIdValues);
        $this->product_id = $product_id;
        return $this;

    }

    public function getClientOid(): ?string {
        return $this->client_oid;
    }

    public function setClientOid(string $client_oid): self {
        $this->client_oid = $client_oid;
        return $this;
    }

    public function getStp(): ?string {
        return $this->stp;
    }

    public function setStp(string $stp): self {

        $this->checkStringInArray($stp, CoinbaseProConstants::$stpValues);
        $this->stp = $stp;
        return $this;

    }

    public function getTimeInForce(): ?string {
        return $this->time_in_force;
    }

    public function setTimeInForce(string $time_in_force): self {
        $this->time_in_force = $time_in_force;
        return $this;
    }

    public function getCancelAfter(): ?string {
        return $this->cancel_after;
    }

    public function setCancelAfter(string $cancel_after): self {

        $this->checkStringInArray($cancel_after, CoinbaseProConstants::$cancelAfterValues);
        $this->cancel_after = $cancel_after;
        return $this;

    }

    public function isPostOnly(): bool {
        return $this->post_only;
    }

    public function setPostOnly(bool $post_only): self {
        $this->post_only = $post_only;
        return $this;
    }

    public function getFunds(): string {
        return $this->funds;
    }

    public function setFunds(string $funds): self {
        $this->funds = $funds;
        return $this;
    }

    public function isOverdraftEnabled(): bool {
        return $this->overdraft_enabled;
    }

    public function setOverdraftEnabled(bool $overdraft_enabled): self {
        $this->overdraft_enabled = $overdraft_enabled;
        return $this;
    }

    public function getFundingAmount(): ?string {
        return $this->funding_amount;
    }

    public function setFundingAmount(string $funding_amount): self {
        $this->funding_amount = $funding_amount;
        return $this;
    }

}
