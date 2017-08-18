<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated\Part;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;

/**
 * Class SepaDepositPart
 *
 * @author Benjamin Franke
 */
class SepaDepositPart implements ResponseTypeInterface {

    use ResponseTypeTrait;

    private $iban;
    private $swift;
    private $bank_name;
    private $bank_address;
    private $bank_country_name;
    private $account_name;
    private $account_address;
    private $reference;

    public function getIban(): ?string {
        return $this->iban;
    }

    private function setIban(?string $iban): self {
        $this->iban = $iban;
        return $this;
    }

    public function getSwift(): ?string {
        return $this->swift;
    }

    private function setSwift(?string $swift): self {
        $this->swift = $swift;
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

    public function getBankCountryName(): ?string {
        return $this->bank_country_name;
    }

    private function setBankCountryName(?string $bank_country_name): self {
        $this->bank_country_name = $bank_country_name;
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

}
