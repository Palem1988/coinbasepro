<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated\Part;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class WireDepositPart
 *
 * @author Benjamin Franke
 */
class WireDepositPart implements ResponseTypeInterface {

    use ResponseTypeTrait {
        initFromArray as protected traitInitFromArray;
    }

    private $account_number;
    private $routing_number;
    private $bank_name;
    private $bank_address;
    private $bank_country;
    private $account_name;
    private $account_address;
    private $reference;

    public function getAccountNumber(): ?string {
        return $this->account_number;
    }

    private function setAccountNumber(?string $account_number): self {
        $this->account_number = $account_number;
        return $this;
    }

    public function getRoutingNumber(): ?string {
        return $this->routing_number;
    }

    private function setRoutingNumber(?string $routing_number): self {
        $this->routing_number = $routing_number;
        return $this;
    }

    public function getBankName(): ?string {
        return $this->bank_name;
    }

    private function setBankName(?string $bank_name): self {
        $this->bank_name = $bank_name;
        return $this;
    }

    public function getBankAddress(): ?string {
        return $this->bank_address;
    }

    private function setBankAddress(?string $bank_address): self {
        $this->bank_address = $bank_address;
        return $this;
    }

    public function getBankCountry(): ?BankCountryPart {
        return $this->bank_country;
    }

    private function setBankCountry(?BankCountryPart $bank_country): self {
        $this->bank_country = $bank_country;
        return $this;
    }

    public function getAccountName(): ?string {
        return $this->account_name;
    }

    private function setAccountName(?string $account_name): self {
        $this->account_name = $account_name;
        return $this;
    }

    public function getAccountAddress(): ?string {
        return $this->account_address;
    }

    private function setAccountAddress(?string $account_address): self {
        $this->account_address = $account_address;
        return $this;
    }

    public function getReference(): ?string {
        return $this->reference;
    }

    private function setReference(?string $reference): self {
        $this->reference = $reference;
        return $this;
    }

    public function initFromArray(array $data): self {

        if (!empty($data['bank_country'])) {
            $this->setBankCountry((new BankCountryPart())->initFromArray($data['bank_country']));
            unset($data['bank_country']);
        }

        $this->traitInitFromArray($data);

        return $this;

    }

}
