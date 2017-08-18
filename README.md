# Unofficial CoinbasePro PHP library
[![Build Status](https://travis-ci.org/benfranke/coinbasepro.svg?branch=master)](https://travis-ci.org/benfranke/coinbasepro)
[![Maintainability](https://api.codeclimate.com/v1/badges/56e24c43352c15cfe604/maintainability)](https://codeclimate.com/github/benfranke/coinbasepro/maintainability)

**This library is still very much in *alpha* state.**

**Use with *caution* and keep an eye on your transaction if you trade with real money.**

## Installation

```
composer require benfranke/coinbasepro
```

## Examples

### PublicClient

```php
$client = new \CoinbasePro\Clients\PublicClient();
```
>Returns: CoinbasePro\Types\ResponseContainer

#### Sandbox
Override the baseURL Property of the Client:
```php
$client->setBaseURL(\CoinbasePro\Utilities\CoinbaseProConstants::CoinbasePro_API_SANDBOX_URL);
```

#### Get Products
```php
$client->getProducts();
```
>Returns: CoinbasePro\Types\ResponseContainer

##### Get Product Order Book

```php
$product = (new CoinbasePro\Types\Request\Market\Product())->setProductId(\CoinbasePro\Utilities\CoinbaseProConstants::PRODUCT_ID_BTC_USD)->setLevel(3);
$productOrderBook = $client->getProductOrderBook($product);
```
>Returns: CoinbasePro\Types\ResponseContainer

##### Get Product Ticker

```php
$product = (new CoinbasePro\Types\Request\Market\Product())->setProductId(\CoinbasePro\Utilities\CoinbaseProConstants::PRODUCT_ID_BTC_USD);
$productTicker = $client->getProductTicker($product);
```
>Returns: CoinbasePro\Types\ResponseContainer

##### Get Product Trades
```php
$product = (new CoinbasePro\Types\Request\Market\Product())
    ->setProductId(\CoinbasePro\Utilities\CoinbaseProConstants::PRODUCT_ID_BTC_USD)
    ->setStart(new DateTime('2017-01-01'))
    ->setEnd(new DateTime())
    ->setGranularity(1200);

$productTrades = $publicClient->getTrades($product);
```
> Returns: CoinbasePro\Types\ResponseContainer

##### Get 24hr Stats
```php
$product = (new CoinbasePro\Types\Request\Market\Product())->setProductId(\CoinbasePro\Utilities\CoinbaseProConstants::PRODUCT_ID_BTC_USD);
$product24HourStats = $publicClient->getProduct24HrStats($product);
```
> Returns: CoinbasePro\Types\ResponseContainer

##### Get currencies
```php
$products = $publicClient->getCurrencies();
```
>Returns: CoinbasePro\Types\ResponseContainer

##### Get the API server time
```php
$time = $publicClient->getTime();
```
>Returns: CoinbasePro\Types\ResponseContainer

### AuthenticatedClient
```php
$client = new \CoinbasePro\Clients\AuthenticatedClient(
    API_KEY
    API_KEY_SECRET
    API_KEY_PASSPHRASE
);
```
>Returns: CoinbasePro\Types\ResponseContainer

##### List Accounts
```php
$accounts = $client->getAccounts();
```
>Returns: CoinbasePro\Types\ResponseContainer

##### Get an Account
```php
$account = (new CoinbasePro\Types\Request\Authenticated\Account())->setId('c7f461b7-d91e-499f-...');
$accountData = $client->getAccount($account);
```
>Returns: CoinbasePro\Types\ResponseContainer

##### Get Account History
```php
$account = (new CoinbasePro\Types\Request\Authenticated\Account())->setId('c7f461b7-d91e-499f-9f59-...')->toPaginated();
$accountHistory = $client->getAccountHistory($account);
```
>Returns: CoinbasePro\Types\ResponseContainer

##### Get Holds
```php
$account = (new CoinbasePro\Types\Request\Authenticated\Account())->setId('c7f461b7-d91e-499f-9f59-...')->toPaginated();
$accountHolds = $client->getAccountHolds($account);
```
>Returns: CoinbasePro\Types\ResponseContainer

##### Place order
```php
$order = (new CoinbasePro\Types\Request\Authenticated\Order())
    ->setType(\CoinbasePro\Utilities\CoinbaseProConstants::ORDER_TYPE_LIMIT)
    ->setProductId(\CoinbasePro\Utilities\CoinbaseProConstants::PRODUCT_ID_BTC_USD)
    ->setSize(0.01)
    ->setSide(\CoinbasePro\Utilities\CoinbaseProConstants::ORDER_SIDE_BUY)
    ->setPrice(3800)
    ->setPostOnly(true)
    ->setStp(\CoinbasePro\Utilities\CoinbaseProConstants::STP_CO);

$response = $client->placeOrder($order);
```
>Returns: CoinbasePro\Types\ResponseContainer

Check for ```$response->getMessage()``` or ```$response->getRejectReason()``` to see if the order has been placed correctly.

##### Cancel an order
```php
$order = (new CoinbasePro\Types\Request\Authenticated\Order())->setId($id);
$response = $client->cancelOrder($order);
```
>Returns: CoinbasePro\Types\ResponseContainer

Check ```$response->getData()``` to see if your order id was cancelled.

##### Cancel all orders
```php
$response = $client->cancelOrders();
```
>Returns: CoinbasePro\Types\ResponseContainer

Check ```$response->getData()``` for an array of order ids that were cancelled.

##### List Orders
```php
$listOrders = (new CoinbasePro\Types\Request\Authenticated\ListOrders())
    ->setStatus(\CoinbasePro\Utilities\CoinbaseProConstants::ORDER_STATUS_ALL)
    ->setProductId(\CoinbasePro\Utilities\CoinbaseProConstants::PRODUCT_ID_BTC_USD);
    
$orders = $client->getOrders($listOrders);
```
>Returns: CoinbasePro\Types\ResponseContainer

##### Get an Order
```php
$order = (new CoinbasePro\Types\Request\Authenticated\Order())->setId($id);
$orderData = $client->getOrder($order);
```
>Returns: CoinbasePro\Types\ResponseContainer

##### List Fills
```php
$fill = (new \CoinbasePro\Types\Request\Authenticated\Fill())
    ->setProductId(\CoinbasePro\Utilities\CoinbaseProConstants::PRODUCT_ID_BTC_USD);

$fillData = $client->getFills($fill);
```
>Returns: CoinbasePro\Types\ResponseContainer

##### List Fundings
```php
$funding = (new \CoinbasePro\Types\Request\Authenticated\Funding())
    ->setStatus(\CoinbasePro\Utilities\CoinbaseProConstants::FUNDING_STATUS_SETTLED);

$fundingData = $client->getFundings($funding);
```
>Returns: CoinbasePro\Types\ResponseContainer

##### Repay Funding
```php
$funding = (new \CoinbasePro\Types\Request\Authenticated\Funding())
    ->setAmount(600)
    ->setCurrency(\CoinbasePro\Utilities\CoinbaseProConstants::CURRENCY_USD);

$repay = $client->repay($funding);
```
>Returns: CoinbasePro\Types\ResponseContainer

##### Margin Transfer
```php
$marginTransfer = (new CoinbasePro\Types\Request\Authenticated\MarginTransfer())
    ->setType(\CoinbasePro\Utilities\CoinbaseProConstants::MARGIN_TRANSFER_TYPE_WITHDRAW)
    ->setCurrency(\CoinbasePro\Utilities\CoinbaseProConstants::CURRENCY_USD)
    ->setMarginProfileId('c1a8236e-19b8-4cec-...')
    ->setAmount(10);

$marginTransferData = $client->marginTransfer($marginTransfer);
```
>Returns: CoinbasePro\Types\ResponseContainer

##### Get Position
```php
$position = $client->getPosition();
```
>Returns: CoinbasePro\Types\ResponseContainer
