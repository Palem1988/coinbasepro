<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;
use CoinbasePro\Types\Response\Authenticated\Part\SepaDepositPart;
use CoinbasePro\Types\Response\Authenticated\Part\WireDepositPart;

/**
 * Class CoinbaseAccount
 *
 * @author Benjamin Franke
 */
class CoinbaseAccount implements ResponseTypeInterface {

    use ResponseTypeTrait {
        initFromArray as protected traitInitFromArray;
    }

    private $id;
    private $name;
    private $balance;
    private $currency;
    private $type;
    private $primary;
    private $active;
    private $wireDeposit;
    private $sepaDeposit;

    public function getId(): ?string {
        return $this->id;
    }

    private function setId(?string $id): self {
        $this->id = $id;
        return $this;
    }

    public function getName(): ?string {
        return $this->name;
    }

    private function setName(?string $name): self {
        $this->name = $name;
        return $this;
    }

    public function getBalance(): ?string {
        return $this->balance;
    }

    private function setBalance(?string $balance): self {
        $this->balance = $balance;
        return $this;
    }

    public function getCurrency(): ?string {
        return $this->currency;
    }

    private function setCurrency(?string $currency): self {
        $this->currency = $currency;
        return $this;
    }

    public function getType(): ?string {
        return $this->type;
    }

    private function setType(?string $type): self {
        $this->type = $type;
        return $this;
    }

    public function isPrimary(): ?bool {
        return $this->primary;
    }

    private function setPrimary(?bool $primary): self {
        $this->primary = $primary;
        return $this;
    }

    public function isActive(): ?bool {
        return $this->active;
    }

    private function setActive(?bool $active): self {
        $this->active = $active;
        return $this;
    }

    public function getWireDepositInformation(): WireDepositPart {
        return $this->wireDeposit;
    }

    private function setWireDepositInformation(WireDepositPart $wireDeposit): self {
        $this->wireDeposit = $wireDeposit;
        return $this;
    }

    public function getSepaDepositInformation(): SepaDepositPart {
        return $this->sepaDeposit;
    }

    private function setSepaDepositInformation(SepaDepositPart $sepaDeposit): self {
        $this->sepaDeposit = $sepaDeposit;
        return $this;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function initFromArray(array $data): self {

        if (!empty($data['wire_deposit_information'])) {
            $this->setWireDepositInformation((new WireDepositPart())->initFromArray($data['wire_deposit_information']));
            unset($data['wire_deposit_information']);
        }

        if (!empty($data['sepa_deposit_information'])) {
            $this->setSepaDepositInformation((new SepaDepositPart())->initFromArray($data['sepa_deposit_information']));
            unset($data['sepa_deposit_information']);
        }

        $this->traitInitFromArray($data);

        return $this;

    }

}
