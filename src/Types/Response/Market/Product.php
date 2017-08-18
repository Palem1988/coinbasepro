<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Market;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class Product
 *
 * @author Benjamin Franke
 */
class Product implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $id;
    private $base_currency;
    private $quote_currency;
    private $base_min_size;
    private $base_max_size;
    private $quote_increment;
    private $display_name;
    private $margin_enabled;
    private $status;
    private $min_market_funds;
    private $max_market_funds;

    public function getId(): ?string {
        return $this->id;
    }

    private function setId(?string $id): self {
        $this->id = $id;
        return $this;
    }

    public function getBaseCurrency(): ?string {
        return $this->base_currency;
    }

    private function setBaseCurrency(?string $base_currency): self {
        $this->base_currency = $base_currency;
        return $this;
    }

    public function getQuoteCurrency(): ?string {
        return $this->quote_currency;
    }

    private function setQuoteCurrency(?string $quote_currency): self {
        $this->quote_currency = $quote_currency;
        return $this;
    }

    public function getBaseMinSize(): ?string {
        return $this->base_min_size;
    }

    private function setBaseMinSize(?string $base_min_size): self {
        $this->base_min_size = $base_min_size;
        return $this;
    }

    public function getBaseMaxSize(): ?string {
        return $this->base_max_size;
    }

    private function setBaseMaxSize(?string $base_max_size): self {
        $this->base_max_size = $base_max_size;
        return $this;
    }

    public function getQuoteIncrement(): ?string {
        return $this->quote_increment;
    }

    private function setQuoteIncrement(?string $quote_increment): self {
        $this->quote_increment = $quote_increment;
        return $this;
    }

    public function getDisplayName(): ?string {
        return $this->display_name;
    }

    private function setDisplayName(?string $display_name): self {
        $this->display_name = $display_name;
        return $this;
    }

    public function isMarginEnabled(): ?bool {
        return $this->margin_enabled;
    }

    private function setMarginEnabled(bool $margin_enabled): self {
        $this->margin_enabled = $margin_enabled;
        return $this;
    }

    public function getStatus(): ?string {
        return $this->status;
    }

    private function setStatus(?string $status): self {
        $this->status = $status;
        return $this;
    }

    public function getMinMarketFunds(): ?string {
        return $this->min_market_funds;
    }

    private function setMinMarketFunds(?string $min_market_funds): self {
        $this->min_market_funds = $min_market_funds;
        return $this;
    }

    public function getMaxMarketFunds(): ?string {
        return $this->max_market_funds;
    }

    private function setMaxMarketFunds(?string $max_market_funds): self {
        $this->max_market_funds = $max_market_funds;
        return $this;
    }
}
