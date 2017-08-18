<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response\Authenticated;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Traits\ResponseTypeTrait;
use CoinbasePro\Types\Response\Authenticated\Part\AccountPart;
use CoinbasePro\Types\Response\Authenticated\Part\FundingPart;
use CoinbasePro\Types\Response\Authenticated\Part\MarginCallPart;
use CoinbasePro\Types\Response\Authenticated\Part\PositionPart;

/**
 * Class Position
 *
 * @author Benjamin Franke
 */
class Position implements ResponseTypeInterface {

    use ResponseTypeTrait {
        initFromArray as private traitInitFromArray;
    }

    private $status;
    private $funding;
    private $accounts = [];
    private $margin_call;
    private $user_id;
    private $profile_id;
    private $position;
    private $product_id;

    public function getStatus(): ?string {
        return $this->status;
    }

    private function setStatus(?string $status): self {
        $this->status = $status;
        return $this;
    }

    public function getFunding(): ?FundingPart {
        return $this->funding;
    }

    private function setFunding(?FundingPart $funding): self {
        $this->funding = $funding;
        return $this;
    }

    public function getAccounts(): ?array {
        return $this->accounts;
    }

    private function setAccounts(?array $accounts): self {
        $this->accounts = $accounts;
        return $this;
    }

    public function getMarginCall(): ?MarginCallPart {
        return $this->margin_call;
    }

    private function setMarginCall(?MarginCallPart $margin_call): self {
        $this->margin_call = $margin_call;
        return $this;
    }

    public function getUserId(): ?string {
        return $this->user_id;
    }

    private function setUserId(?string $user_id): self {
        $this->user_id = $user_id;
        return $this;
    }

    public function getProfileId(): ?string {
        return $this->profile_id;
    }

    private function setProfileId(?string $profile_id): self {
        $this->profile_id = $profile_id;
        return $this;
    }

    public function getPosition(): ?PositionPart {
        return $this->position;
    }

    private function setPosition(?PositionPart $position): self {
        $this->position = $position;
        return $this;
    }

    public function getProductId(): ?string {
        return $this->product_id;
    }

    private function setProductId(?string $product_id): self {
        $this->product_id = $product_id;
        return $this;
    }

    public function initFromArray(array $data): self {

        if (!empty($data['funding'])) {
            $this->setFunding((new FundingPart())->initFromArray($data['funding']));
            unset($data['funding']);
        }

        if (!empty($data['margin_call'])) {
            $this->setMarginCall((new MarginCallPart())->initFromArray($data['margin_call']));
            unset($data['margin_call']);
        }

        if (!empty($data['accounts'])) {

            $this->setAccounts([]);

            foreach ($data['accounts'] as $currency => $details) {
                $details['currency'] = $currency;
                $this->accounts[] = (new AccountPart())->initFromArray($details);
            }

            unset($data['accounts']);

        }

        if (!empty($data['position'])) {
            $this->setPosition((new PositionPart())->initFromArray($data['position']));
            unset($data['position']);
        }

        $this->traitInitFromArray($data);

        return $this;

    }

}
