<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated\Part;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class LimitsPart
 *
 * @author Benjamin Franke
 */
class LimitsPart implements ResponseTypeInterface {

    use ResponseTypeTrait {
        initFromArray as protected traitInitFromArray;
    }

    private $buy;
    private $instant_buy;
    private $sell;
    private $deposit;

    public function getBuy(): ?LimitActionPart {
        return $this->buy;
    }

    private function setBuy(?LimitActionPart $buy): self {
        $this->buy = $buy;
        return $this;
    }

    public function getInstantBuy(): ?LimitActionPart {
        return $this->instant_buy;
    }

    private function setInstantBuy(?LimitActionPart $instant_buy): self {
        $this->instant_buy = $instant_buy;
        return $this;
    }

    public function getSell(): ?LimitActionPart {
        return $this->sell;
    }

    private function setSell(?LimitActionPart $sell): self {
        $this->sell = $sell;
        return $this;
    }

    public function getDeposit(): ?LimitActionPart {
        return $this->deposit;
    }

    private function setDeposit(?LimitActionPart $deposit): self {
        $this->deposit = $deposit;
        return $this;
    }

    public function initFromArray(array $data): self {

        if (!empty($data['buy'])) {
            $this->setBuy((new LimitActionPart())->initFromArray($data['buy']));
            unset($data['buy']);
        }

        if (!empty($data['instant_buy'])) {
            $this->setInstantBuy((new LimitActionPart())->initFromArray($data['instant_buy']));
            unset($data['instant_buy']);
        }

        if (!empty($data['sell'])) {
            $this->setSell((new LimitActionPart())->initFromArray($data['sell']));
            unset($data['sell']);
        }

        if (!empty($data['deposit'])) {
            $this->setDeposit((new LimitActionPart())->initFromArray($data['deposit']));
            unset($data['deposit']);
        }

        $this->traitInitFromArray($data);

        return $this;

    }

}
