<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Request\Market;

use CoinbasePro\Interfaces\RequestTypeInterface;
use CoinbasePro\Traits\RequestTypeTrait;
use CoinbasePro\Traits\ValidatorTrait;
use CoinbasePro\Utilities\CoinbaseProConstants;

/**
 * Class Product
 *
 * @author Benjamin Franke
 */
class Product implements RequestTypeInterface {

    use RequestTypeTrait;
    use ValidatorTrait;

    /** @var string|null */
    protected $product_id;

    /** @var int|null */
    protected $level;

    /** @var \DateTime|null */
    protected $start;

    /** @var \DateTime|null */
    protected $end;

    /** @var int|null */
    protected $granularity;

    public function getProductId(): ?string {
        return $this->product_id;
    }

    public function setProductId(string $product_id): self {

        $this->checkStringInArray($product_id, CoinbaseProConstants::$productIdValues);
        $this->product_id = $product_id;
        return $this;

    }

    public function getLevel(): ?int {
        return $this->level;
    }

    public function setLevel(int $level): self {
        $this->level = $level;
        return $this;
    }

    public function getStart(): ?\DateTime {
        return $this->start;
    }

    public function setStart(\DateTime $start): self {
        $this->start = $start;
        return $this;
    }

    public function getEnd(): ?\DateTime {
        return $this->end;
    }

    public function setEnd(\DateTime $end): self {
        $this->end = $end;
        return $this;
    }

    public function getGranularity(): ?int {
        return $this->granularity;
    }

    public function setGranularity(int $granularity): self {

        $this->checkIntInArray($granularity, CoinbaseProConstants::$granularityValues);
        $this->granularity = $granularity;
        return $this;

    }

}
