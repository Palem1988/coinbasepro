<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Request\Authenticated;

use CoinbasePro\Interfaces\RequestTypeInterface;
use CoinbasePro\Traits\RequestTypeTrait;
use CoinbasePro\Traits\ValidatorTrait;
use CoinbasePro\Utilities\CoinbaseProConstants;

/**
 * Class ListOrders
 *
 * @author Benjamin Franke
 */
class ListOrders implements RequestTypeInterface {

    use RequestTypeTrait;
    use ValidatorTrait;

    private $status;
    private $product_id;

    public function getStatus(): ?string {
        return $this->status;
    }

    public function setStatus(string $status): self {

        $this->checkStringInArray($status, CoinbaseProConstants::$orderStatusValues);
        $this->status = $status;
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

}
