<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated\Part;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class FundingPart
 *
 * @author Benjamin Franke
 */
class FundingPart implements ResponseTypeInterface {

    use ResponseTypeTrait {
        initFromArray as protected traitInitFromArray;
    }

    private $max_funding_value;
    private $funding_value;

    /** @var OldestOutstandingPart */
    private $oldest_outstanding;

    public function getMaxFundingValue(): ?string {
        return $this->max_funding_value;
    }

    private function setMaxFundingValue(?string $max_funding_value): self {
        $this->max_funding_value = $max_funding_value;
        return $this;
    }

    public function getFundingValue(): ?string {
        return $this->funding_value;
    }

    private function setFundingValue(?string $funding_value): self {
        $this->funding_value = $funding_value;
        return $this;
    }

    public function getOldestOutstanding(): ?OldestOutstandingPart {
        return $this->oldest_outstanding;
    }

    private function setOldestOutstanding(?OldestOutstandingPart $oldest_outstanding): self {
        $this->oldest_outstanding = $oldest_outstanding;
        return $this;
    }

    public function initFromArray(array $data): self {

        if (!empty($data['oldest_outstanding'])) {
            $this->setOldestOutstanding((new OldestOutstandingPart())->initFromArray($data['oldest_outstanding']));
        }

        $this->traitInitFromArray($data);

        return $this;

    }

}
