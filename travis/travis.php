<?php declare(strict_types = 1);

require_once __DIR__ . '/../vendor/autoload.php';

$publicClient = new \CoinbasePro\Clients\PublicClient();
$publicClient->setBaseURL(\CoinbasePro\Utilities\CoinbaseProConstants::COINBASEPRO_API_SANDBOX_URL);

$products = $publicClient->getProducts();

echo 'getProduct ';

if (!assert(is_array($products->getData()))) {
    echo 'failure: ' . json_encode($products->getData()) . PHP_EOL;
    exit(1);
}

/** @var \CoinbasePro\Types\Response\Market\Currency $currency */
foreach ($products->getData() as $product) {

    if (!\in_array($product->getId(), \CoinbasePro\Utilities\CoinbaseProConstants::$productIdValues)) {
        echo 'failure: ' . $product->getId() . ' is not in constants' . PHP_EOL;
        exit(1);
    }

}

echo 'success' . PHP_EOL;

echo 'getCurrencies ';

$currencies = $publicClient->getCurrencies();

if (!assert(is_array($currencies->getData()))) {
    echo 'failure: ' . json_encode($currencies->getData()) . PHP_EOL;
    exit(1);
}

/** @var \CoinbasePro\Types\Response\Market\Currency $currency */
foreach ($currencies->getData() as $currency) {

    if (!\in_array($currency->getId(), \CoinbasePro\Utilities\CoinbaseProConstants::$currencyValues)) {
        echo 'failure: ' . $currency->getId() . ' is not in constants' . PHP_EOL;
        exit(1);
    }

}

echo 'success' . PHP_EOL;

echo 'getTime ';

$time = $publicClient->getTime();

if (!assert(is_array($time->getData()))) {
    echo 'failure: ' . json_encode($time->getData()) . PHP_EOL;
    exit(1);
}

echo 'success' . PHP_EOL;

$apiKey = getenv('API_KEY');
$apiSecret = getenv('API_SECRET');
$apiPass = getenv('API_PASS');

if (empty($apiKey) || empty($apiSecret) || empty($apiPass)) {
    echo 'Missing authentication for authorized client integration tests.' . PHP_EOL;
    exit(1);
}

$authenticatedClient = new \CoinbasePro\Clients\AuthenticatedClient(
    $apiKey,
    $apiSecret,
    $apiPass
);

$authenticatedClient->setBaseURL(\CoinbasePro\Utilities\CoinbaseProConstants::COINBASEPRO_API_SANDBOX_URL);

echo 'getAccounts ';

$accounts = $authenticatedClient->getAccounts();

if (!assert(is_array($accounts->getData()))) {
    echo 'failure: ' . json_encode($accounts->getMessage()) . PHP_EOL;
    exit(1);
}

echo PHP_EOL;

foreach ($accounts->getData() as $account) {

    echo 'getAccount ' . $account->getId() . ' ';

    if (!is_array(
        $authenticatedClient
            ->getAccount(
                (new \CoinbasePro\Types\Request\Authenticated\Account())
                    ->initFromResponseAccount($account))
            ->getData()
    )) {
        echo 'failure: ' . json_encode($accounts->getMessage()) . PHP_EOL;
        exit(1);
    }

    echo 'success' . PHP_EOL;

    echo 'getAccountHistory ' . $account->getId() . ' ';

    if (!is_array(
        $authenticatedClient
            ->getAccountHistory(
                (new \CoinbasePro\Types\Request\Authenticated\Account())
                    ->initFromResponseAccount($account)->toPaginated()
            )->getData()
    )) {
        echo 'failure: ' . json_encode($accounts->getMessage()) . PHP_EOL;
        exit(1);
    }

    echo 'success' . PHP_EOL;

    echo 'getAccountHolds ' . $account->getId() . ' ';

    if (!is_array(
        $authenticatedClient
            ->getAccountHolds(
                (new \CoinbasePro\Types\Request\Authenticated\Account())
                    ->initFromResponseAccount($account)->toPaginated()
            )->getData()
    )) {
        echo 'failure: ' . json_encode($accounts->getMessage()) . PHP_EOL;
        exit(1);
    }

    echo 'success' . PHP_EOL;

}

echo 'Done' . PHP_EOL;

exit(0);
