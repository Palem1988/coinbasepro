<?php declare(strict_types = 1);

namespace CoinbasePro\Traits;

/**
 * Trait ValidatorTrait
 *
 * @author Benjamin Franke
 */
trait ValidatorTrait {

    private function checkStringInArray(string $string, array $array): void {

        if (!\in_array($string, $array, true)) {
            throw new \LogicException($string . ' is not among the allowed values of ' . \implode(', ', $array));
        }

    }

    private function checkIntInArray(int $int, array $array): void {

        if (!\in_array($int, $array, true)) {
            throw new \LogicException($int . ' is not among the allowed values of ' . \implode(', ', $array));
        }

    }

}
