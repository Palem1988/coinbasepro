<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class Hold
 *
 * @author Benjamin Franke
 */
class Hold implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $id;
    private $account_id;
    private $created_at;
    private $updated_at;
    private $amount;
    private $type;
    private $ref;

    public function getId(): ?string {
        return $this->id;
    }

    private function setId(?string $id): self {
        $this->id = $id;
        return $this;
    }

    public function getAccountId(): self {
        return $this->account_id;
    }

    private function setAccountId(?string $account_id): self {
        $this->account_id = $account_id;
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

    public function getUpdatedAt():? \DateTime {
        return $this->updated_at;
    }

    private function setUpdatedAt(?string $updated_at): self {

        if ($updated_at === null) {
            return $this;
        }

        $this->updated_at = new \DateTime($updated_at);
        return $this;

    }

    public function getAmount(): ?string {
        return $this->amount;
    }

    private function setAmount(?string $amount): self {
        $this->amount = $amount;
        return $this;
    }

    public function getType(): ?string {
        return $this->type;
    }

    private function setType(?string $type): self {
        $this->type = $type;
        return $this;
    }

    public function getRef(): ?string {
        return $this->ref;
    }

    private function setRef(?string $ref): self {
        $this->ref = $ref;
        return $this;
    }

}
