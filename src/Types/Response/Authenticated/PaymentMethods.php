<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class PaymentMethods
 *
 * @author Benjamin Franke
 */
class PaymentMethods implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $id;
    private $type;
    private $name;
    private $currency;
    private $primary_buy;
    private $primary_sell;
    private $allow_buy;
    private $allow_sell;
    private $allow_deposit;
    private $allow_withdraw;

    /**
     * TODO: Implement this
     */
    private $limits = [];

    public function getId(): ?string {
        return $this->id;
    }

    private function setId(?string $id): self {
        $this->id = $id;
        return $this;
    }

    public function getType(): ?string {
        return $this->type;
    }

    private function setType(?string $type): self {
        $this->type = $type;
        return $this;
    }

    public function getName(): ?string {
        return $this->name;
    }

    private function setName(?string $name): self {
        $this->name = $name;
        return $this;
    }

    public function getCurrency(): ?string {
        return $this->currency;
    }

    private function setCurrency(?string $currency): self {
        $this->currency = $currency;
        return $this;
    }

    public function isPrimaryBuy(): ?bool {
        return $this->primary_buy;
    }

    private function setPrimaryBuy(?bool $primary_buy): self {
        $this->primary_buy = $primary_buy;
        return $this;
    }

    public function isPrimarySell(): ?bool {
        return $this->primary_sell;
    }

    private function setPrimarySell(?bool $primary_sell): self {
        $this->primary_sell = $primary_sell;
        return $this;
    }

    public function isAllowBuy(): ?bool {
        return $this->allow_buy;
    }

    private function setAllowBuy(?bool $allow_buy): self {
        $this->allow_buy = $allow_buy;
        return $this;
    }

    public function isAllowSell(): ?bool {
        return $this->allow_sell;
    }

    private function setAllowSell(?bool $allow_sell): self {
        $this->allow_sell = $allow_sell;
        return $this;
    }

    public function isAllowDeposit(): ?bool {
        return $this->allow_deposit;
    }

    private function setAllowDeposit(?bool $allow_deposit): self {
        $this->allow_deposit = $allow_deposit;
        return $this;
    }

    public function isAllowWithdraw(): ?bool {
        return $this->allow_withdraw;
    }

    private function setAllowWithdraw(?bool $allow_withdraw): self {
        $this->allow_withdraw = $allow_withdraw;
        return $this;
    }

    public function getLimits(): ?array {
        return $this->limits;
    }

    private function setLimits(?array $limits): self {
        $this->limits = $limits;
        return $this;
    }

}
