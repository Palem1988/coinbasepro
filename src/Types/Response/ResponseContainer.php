<?php declare(strict_types = 1);

namespace CoinbasePro\Types\Response;

use CoinbasePro\Interfaces\ResponseTypeInterface;

/**
 * Class ResponseContainer
 *
 * @author Benjamin Franke
 */
class ResponseContainer {

    /** @var ResponseTypeInterface[] */
    private $data = [];

    private $message;
    private $before;
    private $after;

    private $rawData;

    public function __construct(array $rawData = []) {
        $this->rawData = $rawData;
    }

    /**
     * @throws \InvalidArgumentException
     */
    public function mapResponseToType(string $type): self {

        if (!\class_exists($type)) {
            throw new \InvalidArgumentException('Undefined response type ' . $type);
        }

        if (!empty($this->rawData['before'])) {
            $this->setBefore($this->rawData['before']);
            unset($this->rawData['before']);
        }

        if (!empty($this->rawData['after'])) {
            $this->setAfter($this->rawData['after']);
            unset($this->rawData['after']);
        }

        if (!empty($this->rawData['message'])) {
            $this->setMessage($this->rawData['message']);
            unset($this->rawData['message']);
        }

        if (!empty($this->rawData)) {

            if (!is_array($this->rawData[0] ?? null)) {
                $this->addData((new $type())->initFromArray($this->rawData));
            } else {

                foreach ($this->rawData as $dataSet) {
                    $this->addData((new $type())->initFromArray($dataSet));
                }

            }

        }

        return $this;

    }

    public function hasData(): bool {
        return !empty($this->data);
    }

    public function getData(): array {
        return $this->data;
    }

    public function getFirst(): ?ResponseTypeInterface {
        return $this->data[0] ?? null;
    }

    private function addData(ResponseTypeInterface $data): self {
        $this->data[] = $data;
        return $this;
    }

    private function setBefore(?int $before): self {
        $this->before = $before;
        return $this;
    }

    public function getBefore(): ?int {
        return $this->before;
    }

    private function setAfter(?int $after): self {
        $this->after = $after;
        return $this;
    }

    public function getAfter(): ?int {
        return $this->after;
    }

    private function setMessage(?string $message): self {
        $this->message = $message;
        return $this;
    }

    public function getMessage(): ?string {
        return $this->message;
    }

}
