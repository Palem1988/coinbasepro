<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated\Part;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class ParamsPart
 *
 * @author Benjamin Franke
 */
class ParamsPart implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $start_date;
    private $end_date;

    public function getStartDate(): ?\DateTime {
        return $this->start_date;
    }

    protected function setStartDate(?string $start_date): self {

        if ($start_date === null) {
            return $this;
        }

        $this->start_date = new \DateTime($start_date);
        return $this;

    }

    public function getEndDate(): ?\DateTime {
        return $this->end_date;
    }

    protected function setEndDate(string $end_date): self {

        if ($end_date === null) {
            return $this;
        }

        $this->end_date = new \DateTime($end_date);
        return $this;

    }

}
