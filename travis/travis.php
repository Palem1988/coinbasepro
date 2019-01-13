<?php declare(strict_types = 1);

require_once __DIR__ . '/../vendor/autoload.php';

$publicClient = new \CoinbasePro\Clients\PublicClient();
$publicClient->setBaseURL(\CoinbasePro\Utilities\CoinbaseProConstants::COINBASEPRO_API_SANDBOX_URL);

$products = $publicClient->getProducts();
$orderPrice = 0;

echo 'getProduct ';

if (!assert(is_array($products->getData()))) {
    echo 'failure: ' . json_encode($products->getData()) . PHP_EOL;
    exit(1);
}

echo PHP_EOL;

foreach ($products->getData() as $product) {

    /** @var \CoinbasePro\Types\Response\Market\Currency $currency */

    if (!\in_array($product->getId(), \CoinbasePro\Utilities\CoinbaseProConstants::$productIdValues)) {
        echo 'failure: ' . $product->getId() . ' is not in constants' . PHP_EOL;
        exit(1);
    }

    echo 'orderBook ' . $product->getId();

    $orderBook = $publicClient->getProductOrderBook((new \CoinbasePro\Types\Request\Market\Product())->initFromResponse($product));

    if (!is_array($orderBook->getData())) {
        echo ' failure' . PHP_EOL;
        exit(1);
    }

    echo ' success' . PHP_EOL;

    echo 'ticker ' . $product->getId();

    $ticker = $publicClient->getProductTicker((new \CoinbasePro\Types\Request\Market\Product())->initFromResponse($product));

    if (!is_array($ticker->getData())) {
        echo ' failure' . PHP_EOL;
        exit(1);
    }

    if ($product->getId() === \CoinbasePro\Utilities\CoinbaseProConstants::PRODUCT_ID_BTC_USD) {
        $orderPrice = $ticker->getFirst()->getPrice();
    }

    echo ' success' . PHP_EOL;

    echo 'trades ' . $product->getId();

    $ticker = $publicClient->getTrades((new \CoinbasePro\Types\Request\Market\Product())->initFromResponse($product));

    if (!is_array($ticker->getData())) {
        echo ' failure' . PHP_EOL;
        exit(1);
    }

    echo ' success' . PHP_EOL;

    echo 'historic ' . $product->getId();

    $ticker = $publicClient->getProductHistoricRates((new \CoinbasePro\Types\Request\Market\Product())->initFromResponse($product));

    if (!is_array($ticker->getData())) {
        echo ' failure' . PHP_EOL;
        exit(1);
    }

    echo ' success' . PHP_EOL;

    echo '24h ' . $product->getId();

    $ticker = $publicClient->getProduct24HrStats((new \CoinbasePro\Types\Request\Market\Product())->initFromResponse($product));

    if (!is_array($ticker->getData())) {
        echo ' failure' . PHP_EOL;
        exit(1);
    }

    echo ' success' . PHP_EOL;

}

echo 'success' . PHP_EOL;

echo 'getCurrencies ';

$currencies = $publicClient->getCurrencies();

if (!assert(is_array($currencies->getData()))) {
    echo 'failure: ' . json_encode($currencies->getData()) . PHP_EOL;
    exit(1);
}

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

echo 'placeOrder';

$order = (new \CoinbasePro\Types\Request\Authenticated\Order())
    ->setProductId(\CoinbasePro\Utilities\CoinbaseProConstants::PRODUCT_ID_BTC_USD)
    ->setPrice((float)$orderPrice)
    ->setSize(0.01)
    ->setSide(\CoinbasePro\Utilities\CoinbaseProConstants::ORDER_SIDE_BUY);

$order = $authenticatedClient->placeOrder($order);

if (!is_array($order->getData())) {
    echo 'failure: ' . json_encode($accounts->getMessage()) . PHP_EOL;
    exit(1);
}

echo 'success' . PHP_EOL;
exit(0);
