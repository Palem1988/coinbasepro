<?php declare(strict_types = 1);

namespace CoinbasePro\Traits;

/**
 * Trait RequestTypeTrait
 *
 * @author Benjamin Franke
 */
trait RequestTypeTrait {

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
