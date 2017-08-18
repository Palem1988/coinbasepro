<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated\Part;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class LimitActionPart
 *
 * @author Benjamin Franke
 */
class LimitActionPart implements ResponseTypeInterface {

    use ResponseTypeTrait {
        initFromArray as protected traitInitFromArray;
    }

    private $period_in_days;
    private $total;
    private $remaining;

    public function getPeriodInDays(): ?string {
        return $this->period_in_days;
    }

    private function setPeriodInDays(string $period_in_days): self {
        $this->period_in_days = $period_in_days;
        return $this;
    }

    public function getTotal(): ?LimitAmount {
        return $this->total;
    }

    private function setTotal(?LimitAmount $total): self {
        $this->total = $total;
        return $this;
    }

    public function getRemaining(): ?LimitAmount {
        return $this->remaining;
    }

    private function setRemaining(?LimitAmount $remaining): self {
        $this->remaining = $remaining;
        return $this;
    }

    public function initFromArray(array $data): self {

        if (!empty($data['total'])) {
            $this->setTotal((new LimitAmount())->initFromArray($data['total']));
            unset($data['total']);
        }

        if (!empty($data['remaining'])) {
            $this->setRemaining((new LimitAmount())->initFromArray($data['remaining']));
            unset($data['remaining']);
        }

        $this->traitInitFromArray($data);

        return $this;

    }

}
