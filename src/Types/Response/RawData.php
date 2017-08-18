<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class RawData
 *
 * @author Benjamin Franke
 */
class RawData implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $data = [];

    public function initFromArray(array $data): self {
        $this->setData($data);
        return $this;
    }

    public function getData(): array {
        return $this->data;
    }

    private function setData(array $data): self {
        $this->data = $data;
        return $this;
    }

}
