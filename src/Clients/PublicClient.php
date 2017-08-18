<?php declare(strict_types = 1);

namespace CoinbasePro\Clients;

use CoinbasePro\Types\Request\Market\Product as RequestProduct;
use CoinbasePro\Types\Response\Market\Currency as ResponseCurrency;
use CoinbasePro\Types\Response\Market\Product as ResponseProduct;
use CoinbasePro\Types\Response\Market\Product24HourStats as ResponseProduct24HourStats;
use CoinbasePro\Types\Response\Market\ProductHistoricRate as ResponseProductHistoricRate;
use CoinbasePro\Types\Response\Market\ProductOrderBook as ResponseProductOrderBook;
use CoinbasePro\Types\Response\Market\ProductTicker as ResponseProductTicker;
use CoinbasePro\Types\Response\Market\Time as ResponseTime;
use CoinbasePro\Types\Response\Market\Trade as ResponseTrade;
use CoinbasePro\Types\Response\ResponseContainer;
use CoinbasePro\Utilities\CoinbaseProConstants;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;

/**
 * Class PublicClient
 *
 * @author Benjamin Franke
 */
class PublicClient {

    private $productId;
    private $retries = 5;
    private $baseURL = CoinbaseProConstants::COINBASEPRO_API_URL;

    public function getProductId(): ?string {
        return $this->productId;
    }

    public function setProductId(string $productId): self {
        $this->productId = $productId;
        return $this;
    }

    public function getBaseURL(): ?string {
        return $this->baseURL;
    }

    public function setBaseURL(string $baseURL): ?self {
        $this->baseURL = $baseURL;
        return $this;
    }

    protected function get(array $uriParts, string $type, array $options = []): ResponseContainer {

        $response = $this->request(CoinbaseProConstants::METHOD_GET, $uriParts, $options);

        if (!\is_array($response)) {
            throw new \Exception('Received invalid response : ' . $response . ' when expecting an array.');
        }

        return (new ResponseContainer($response))->mapResponseToType($type);

    }

    protected function request(string $method, array $uriParts, array $options = [], array $headers = []): array {

        $retries = 0;

        $requestOptions = [
            'base_uri'                  => $this->baseURL,
            RequestOptions::HTTP_ERRORS => false,
        ];

        if (($streamHandle = \fopen('php://memory', 'rb+')) !== false) {
            $requestOptions[RequestOptions::SINK] = \GuzzleHttp\Psr7\stream_for($streamHandle);
        }

        switch ($method) {

            case CoinbaseProConstants::METHOD_POST:
            case CoinbaseProConstants::METHOD_PUT:
                $requestOptions[RequestOptions::JSON] = $options;
                break;

            case CoinbaseProConstants::METHOD_GET:
            case CoinbaseProConstants::METHOD_DELETE:
                $requestOptions[RequestOptions::QUERY] = $options;
                break;

            default:
                throw new \LogicException('Invalid method specified');

        }

        $client = new Client($requestOptions);

        $uri = \implode('/', $uriParts);

        $requestOptions[RequestOptions::HEADERS] = \array_merge(CoinbaseProConstants::$defaultHeaders, $headers);

        $response = new Response();

        while ($retries < 5) {

            $response = $client->request($method, $uri, $requestOptions);

            switch ($response->getStatusCode()) {

                case 429:
                    \usleep(500000);
                    $retries++;
                    break;

                default:
                    break 2;

            }

        }

        $data = \json_decode($response->getBody()->getContents(), true);

        if (\json_last_error() !== JSON_ERROR_NONE) {

            throw new \JsonException(
                'Received invalid JSON in response. Error: ' . \json_last_error_msg() .
                ' - Body: ' . $response->getBody()->getContents()
            );

        }

        if (!empty($response->getHeaders()['CB-BEFORE'])) {
            $data['before'] = $response->getHeaders()['CB-BEFORE'];
        }

        if (!empty($response->getHeaders()['CB-AFTER'])) {
            $data['after'] = $response->getHeaders()['CB-AFTER'];
        }

        return $data;

    }

    /**
     * Get a list of available currency pairs for trading.
     */
    public function getProducts(): ResponseContainer {
        return $this->get(['products'], ResponseProduct::class);
    }

    /**
     * Get a list of open orders for a product. The amount of detail shown can be customized with the level parameter.
     */
    public function getProductOrderBook(RequestProduct $product): ResponseContainer {
        return $this->get(['products', $product->getProductId(), 'book'], ResponseProductOrderBook::class, $product->toArray());
    }

    /**
     * Snapshot information about the last trade (tick), best bid/ask and 24h volume.
     */
    public function getProductTicker(RequestProduct $product): ResponseContainer {
        return $this->get(['products', $product->getProductId(), 'ticker'], ResponseProductTicker::class);
    }

    /**
     * List the latest trades for a product.
     */
    public function getTrades(RequestProduct $product): ResponseContainer {
        return $this->get(['products', $product->getProductId(), 'trades'], ResponseTrade::class, $product->toArray());
    }

    /**
     * Historic rates for a product. Rates are returned in grouped buckets based on requested granularity.
     */
    public function getProductHistoricRates(RequestProduct $product): ResponseContainer {
        return $this->get(['products', $product->getProductId(), 'candles'], ResponseProductHistoricRate::class, $product->toArray());
    }

    /**
     * Get 24 hr stats for the product. volume is in base currency units. open, high, low are in quote currency units.
     */
    public function getProduct24HrStats(RequestProduct $product): ResponseContainer {
        return $this->get(['products', $product->getProductId(), 'stats'], ResponseProduct24HourStats::class);
    }

    /**
     * List known currencies.
     */
    public function getCurrencies(): ResponseContainer {
        return $this->get(['currencies'], ResponseCurrency::class);
    }

    /**
     * Get the API server time.
     */
    public function getTime(): ResponseContainer {
        return $this->get(['time'], ResponseTime::class);
    }

    protected function put(array $uriParts, string $type, array $options = []): ResponseContainer {
        $response = $this->request(CoinbaseProConstants::METHOD_PUT, $uriParts, $options);
        return (new ResponseContainer($response))->mapResponseToType($type);
    }

    protected function post(array $uriParts, string $type, array $options = []): ResponseContainer {
        $response = $this->request(CoinbaseProConstants::METHOD_POST, $uriParts, $options);
        return (new ResponseContainer($response))->mapResponseToType($type);
    }

    protected function delete(array $uriParts, string $type, array $options = []): ResponseContainer {
        $response = $this->request(CoinbaseProConstants::METHOD_DELETE, $uriParts, $options);
        return (new ResponseContainer($response))->mapResponseToType($type);
    }

}
