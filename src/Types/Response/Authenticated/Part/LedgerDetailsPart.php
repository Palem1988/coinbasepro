<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated\Part;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class LedgerDetailsPart
 *
 * @author Benjamin Franke
 */
class LedgerDetailsPart implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $order_id;
    private $trade_id;
    private $product_id;
    private $transfer_id;
    private $transfer_type;
    private $type;
    private $direction;

    public function getOrderId(): ?string {
        return $this->order_id;
    }

    private function setOrderId(?string $order_id): self {
        $this->order_id = $order_id;
        return $this;
    }

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

    public function getTransferId(): ?string {
        return $this->transfer_id;
    }

    private function setTransferId(?string $transfer_id): self {
        $this->transfer_id = $transfer_id;
        return $this;
    }

    public function getTransferType(): ?string {
        return $this->transfer_type;
    }

    private function setTransferType(?string $transfer_type): self {
        $this->transfer_type = $transfer_type;
        return $this;
    }

    public function getType(): ?string {
        return $this->type;
    }

    private function setType(?string $type): self {
        $this->type = $type;
        return $this;
    }

    public function getDirection(): ?string {
        return $this->direction;
    }

    private function setDirection(?string $direction): self {
        $this->direction = $direction;
        return $this;
    }

}
