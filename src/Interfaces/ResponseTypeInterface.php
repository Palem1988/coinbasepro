<?php declare(strict_types = 1);

namespace CoinbasePro\Interfaces;

/**
 * Interface ResponseTypeInterface
 *
 * @author Benjamin Franke
 */
interface ResponseTypeInterface {

    public function initFromArray(array $data);
    public function toArray(): array;

}
