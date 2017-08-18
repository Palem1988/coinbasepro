<?php declare(strict_types = 1);

namespace CoinbasePro\Traits;

/**
 * Trait ResponseTypeTrait
 *
 * @author Benjamin Franke
 */
trait ResponseTypeTrait {

    public function initFromArray(array $data): self {

        $unknownFields = [];

        foreach ($data as $k => $v) {

            if (empty($v)) {
                continue;
            }

            $setter = 'set' . \ucfirst(\str_replace('_', '', \ucwords($k, '_')));

            if (\method_exists($this, $setter)) {
                $this->{$setter}($v);
                continue;
            }

            $unknownFields[$k] = $v;

        }

        if (!empty($unknownFields)) {
            \trigger_error('Encountered unknown fields in response: ' . \json_encode($unknownFields));
        }

        return $this;

    }

    public function toArray(): array {

        $data = [];

        $vars = \get_object_vars($this);

        foreach ($vars as $k => $v) {

            if (empty($v)) {
                continue;
            }

            if ($v instanceof \DateTime) {
                $data[$k] = $v->format('c');
                continue;
            }

            $data[$k] = $v;

        }

        return $data;

    }

}
