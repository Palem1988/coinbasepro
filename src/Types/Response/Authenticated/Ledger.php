<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;
use CoinbasePro\Types\Response\Authenticated\Part\LedgerDetailsPart;

/**
 * Class Ledger
 *
 * @author Benjamin Franke
 */
class Ledger implements ResponseTypeInterface {

    use ResponseTypeTrait {
        initFromArray as private traitInitFromArray;
    }

    private $id;
    private $created_at;
    private $amount;
    private $balance;
    private $type;
    private $details;

    public function getId(): ?int {
        return $this->id;
    }

    private function setId(?int $id): self {
        $this->id = $id;
        return $this;
    }

    public function getCreatedAt(): ?\DateTime {
        return $this->created_at;
    }

    private function setCreatedAt(?string $created_at): self {

        if ($created_at === null) {
            return $this;
        }

        $this->created_at = new \DateTime($created_at);
        return $this;

    }

    public function getAmount(): self {
        return $this->amount;
    }

    private function setAmount(?string $amount): self {
        $this->amount = $amount;
        return $this;
    }

    public function getBalance(): ?string {
        return $this->balance;
    }

    private function setBalance(?string $balance): self {
        $this->balance = $balance;
        return $this;
    }

    public function getType(): ?string {
        return $this->type;
    }

    private function setType(?string $type): self {
        $this->type = $type;
        return $this;
    }

    public function getDetails(): ?LedgerDetailsPart {
        return $this->details;
    }

    private function setDetails(?LedgerDetailsPart $details): self {
        $this->details = $details;
        return $this;
    }

    public function initFromArray(array $data): self {

        if (!empty($data['details'])) {
            $this->setDetails((new LedgerDetailsPart())->initFromArray($data['details']));
            unset($data['details']);
        }

        $this->traitInitFromArray($data);

        return $this;

    }

}
