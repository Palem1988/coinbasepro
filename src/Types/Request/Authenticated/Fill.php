<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Request\Authenticated;

use CoinbasePro\Interfaces\RequestTypeInterface;
use CoinbasePro\Traits\RequestTypeTrait;
use CoinbasePro\Traits\ValidatorTrait;
use CoinbasePro\Utilities\CoinbaseProConstants;

/**
 * Class Fill
 *
 * @author Benjamin Franke
 */
class Fill implements RequestTypeInterface {

    use RequestTypeTrait;
    use ValidatorTrait;

    private $order_id;
    private $product_id;

    public function getOrderId(): ?string {
        return $this->order_id;
    }

    public function setOrderId(string $order_id): self {
        $this->order_id = $order_id;
        return $this;
    }

    public function getProductId(): ?string {
        return $this->product_id;
    }

    public function setProductId($product_id): self {

        $this->checkStringInArray($product_id, CoinbaseProConstants::$productIdValues);
        $this->product_id = $product_id;
        return $this;

    }

}
