<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;
use CoinbasePro\Types\Response\Authenticated\Part\ParamsPart;

/**
 * Class Report
 *
 * @author Benjamin Franke
 */
class Report implements ResponseTypeInterface {

    use ResponseTypeTrait {
        initFromArray as private traitInitFromArray;
    }

    private $id;
    private $type;
    private $status;
    private $created_at;
    private $completed_at;
    private $expires_at;
    private $file_url;
    private $params;

    public function getId(): ?string {
        return $this->id;
    }

    private function setId(?string $id): self {
        $this->id = $id;
        return $this;
    }

    public function getType(): ?string {
        return $this->type;
    }

    private function setType(?string $type): self {
        $this->type = $type;
        return $this;
    }

    public function getStatus(): ?string {
        return $this->status;
    }

    private function setStatus(?string $status): self {
        $this->status = $status;
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

    public function getCompletedAt(): ?\DateTime {
        return $this->completed_at;
    }

    private function setCompletedAt(?string $completed_at): self {

        if ($completed_at === null) {
            return $this;
        }

        $this->completed_at = new \DateTime($completed_at);
        return $this;

    }

    public function getExpiresAt(): ?\DateTime {
        return $this->expires_at;
    }

    private function setExpiresAt(?string $expires_at): self {

        if ($expires_at === null) {
            return $this;
        }

        $this->expires_at = new \DateTime($expires_at);
        return $this;

    }

    public function getFileUrl(): ?string {
        return $this->file_url;
    }

    private function setFileUrl(?string $file_url): self {
        $this->file_url = $file_url;
        return $this;
    }

    public function getParams(): ?string {
        return $this->params;
    }

    private function setParams(?ParamsPart $params): self {
        $this->params = $params;
        return $this;
    }

    public function initFromArray(array $data): self {

        if (!empty($data['params'])) {
            $this->setParams((new ParamsPart())->initFromArray($data['params']));
            unset($data['params']);
        }

        $this->traitInitFromArray($data);

        return $this;

    }

}
