<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Request\Authenticated;

use CoinbasePro\Interfaces\RequestTypeInterface;
use CoinbasePro\Traits\RequestTypeTrait;
use CoinbasePro\Traits\ValidatorTrait;
use CoinbasePro\Utilities\CoinbaseProConstants;

/**
 * Class Report
 *
 * @author Benjamin Franke
 */
class Report implements RequestTypeInterface {

    use RequestTypeTrait;
    use ValidatorTrait;

    private $id;
    private $type;
    private $start_date;
    private $end_date;
    private $product_id;
    private $account_id;
    private $format;
    private $email;

    public function getId(): ?string {
        return $this->id;
    }

    public function setId(string $id): self {
        $this->id = $id;
        return $this;
    }

    public function getType(): ?string {
        return $this->type;
    }

    public function setType(string $type): self {
        $this->type = $type;
        return $this;
    }

    public function getStartDate(): ?\DateTime {
        return $this->start_date;
    }

    public function setStartDate(\DateTime $start_date): self {
        $this->start_date = $start_date;
        return $this;
    }

    public function getEndDate(): ?\DateTime {
        return $this->end_date;
    }

    public function setEndDate(\DateTime $end_date): self {
        $this->end_date = $end_date;
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

    public function getAccountId(): ?string {
        return $this->account_id;
    }

    public function setAccountId(string $account_id): self {
        $this->account_id = $account_id;
        return $this;
    }

    public function getFormat(): ?string {
        return $this->format;
    }

    public function setFormat(string $format): self {

        $this->checkStringInArray($format, CoinbaseProConstants::$reportFormatValues);
        $this->format = $format;
        return $this;

    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

}
