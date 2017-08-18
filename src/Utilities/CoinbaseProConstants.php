<?php declare(strict_types = 1);

namespace CoinbasePro\Utilities;

/**
 * Class CoinbaseProConstants
 *
 * @author Benjamin Franke
 */
class CoinbaseProConstants {

    public const        COINBASEPRO_API_URL         = 'https://api.pro.coinbase.com';
    public const        COINBASEPRO_API_SANDBOX_URL = 'https://api-public.sandbox.pro.coinbase.com';

    public const METHOD_GET    = 'GET';
    public const METHOD_PUT    = 'PUT';
    public const METHOD_POST   = 'POST';
    public const METHOD_DELETE = 'DELETE';

    public const PRODUCT_ID_BTC_USD  = 'BTC-USD';
    public const PRODUCT_ID_BTC_GBP  = 'BTC-GBP';
    public const PRODUCT_ID_BTC_EUR  = 'BTC-EUR';
    public const PRODUCT_ID_BCH_USD  = 'BCH-USD';
    public const PRODUCT_ID_BCH_BTC  = 'BCH-BTC';
    public const PRODUCT_ID_BCH_EUR  = 'BCH-EUR';
    public const PRODUCT_ID_ETH_USD  = 'ETH-USD';
    public const PRODUCT_ID_ETH_EUR  = 'ETH-EUR';
    public const PRODUCT_ID_ETH_BTC  = 'ETH-BTC';
    public const PRODUCT_ID_LTC_USD  = 'LTC-USD';
    public const PRODUCT_ID_LTC_EUR  = 'LTC-EUR';
    public const PRODUCT_ID_LTC_BTC  = 'LTC-BTC';
    public const PRODUCT_ID_ETC_USD  = 'ETC-USD';
    public const PRODUCT_ID_ETC_EUR  = 'ETC-EUR';
    public const PRODUCT_ID_ETC_BTC  = 'ETC-BTC';
    public const PRODUCT_ID_ZRX_BTC  = 'ZRX-BTC';
    public const PRODUCT_ID_BTC_USDC = 'BTC-USDC';
    public const PRODUCT_ID_ETH_USDC = 'ETH-USDC';
    public const PRODUCT_ID_BAT_USDC = 'BAT-USDC';
    public const PRODUCT_ID_ZRX_EUR  = 'ZRX-EUR';
    public const PRODUCT_ID_ZRX_USD  = 'ZRX-USD';
    public const PRODUCT_ID_CVC_USDC = 'CVC-USDC';
    public const PRODUCT_ID_DNT_USDC = 'DNT-USDC';
    public const PRODUCT_ID_LOOM_USDC = 'LOOM-USDC';
    public const PRODUCT_ID_MANA_USDC = 'MANA-USDC';

    public const TIME_IN_FORCE_GTC = 'GTC';
    public const TIME_IN_FORCE_GTT = 'GTT';
    public const TIME_IN_FORCE_IOC = 'IOC';
    public const TIME_IN_FORCE_FOK = 'FOK';

    public const ORDER_TYPE_LIMIT  = 'limit';
    public const ORDER_TYPE_MARKET = 'market';
    public const ORDER_TYPE_STOP   = 'stop';

    public const ORDER_SIDE_BUY  = 'buy';
    public const ORDER_SIDE_SELL = 'sell';

    public const STP_DC = 'dc';
    public const STP_CO = 'co';
    public const STP_CN = 'cn';
    public const STP_CB = 'cb';

    public const ORDER_STATUS_OPEN    = 'open';
    public const ORDER_STATUS_PENDING = 'pending';
    public const ORDER_STATUS_ACTIVE  = 'active';

    public const FUNDING_STATUS_OUTSTANDING = 'outstanding';
    public const FUNDING_STATUS_SETTLED     = 'settled';
    public const FUNDING_STATUS_REJECTED    = 'rejected';

    public const ORDER_STATUS_ALL = 'all';

    public const CURRENCY_USD  = 'USD';
    public const CURRENCY_GBP  = 'GBP';
    public const CURRENCY_EUR  = 'EUR';
    public const CURRENCY_BTC  = 'BTC';
    public const CURRENCY_BCH  = 'BCH';
    public const CURRENCY_ETH  = 'ETH';
    public const CURRENCY_LTC  = 'LTC';
    public const CURRENCY_ETC  = 'ETC';
    public const CURRENCY_ZRX  = 'ZRX';
    public const CURRENCY_USDC = 'USDC';
    public const CURRENCY_BAT  = 'BAT';
    public const CURRENCY_CVC  = 'CVC';
    public const CURRENCY_DNT  = 'DNT';
    public const CURRENCY_LOOM = 'LOOM';
    public const CURRENCY_MANA = 'MANA';

    public const MARGIN_TRANSFER_TYPE_DEPOSIT  = 'deposit';
    public const MARGIN_TRANSFER_TYPE_WITHDRAW = 'withdraw';

    public const REPORT_TYPE_FILLS   = 'fills';
    public const REPORT_TYPE_ACCOUNT = 'account';

    public const REPORT_FORMAT_PDF = 'pdf';
    public const REPORT_FORMAT_CSV = 'csv';

    public const CANCEL_AFTER_MIN  = 'min';
    public const CANCEL_AFTER_HOUR = 'hour';
    public const CANCEL_AFTER_DAY  = 'day';

    public const GRANULARITY_1_MIN  = 60;
    public const GRANULARITY_5_MIN  = 300;
    public const GRANULARITY_15_MIN = 900;
    public const GRANULARITY_1_HOUR = 3600;
    public const GRANULARITY_6_HOUR = 21600;
    public const GRANULARITY_1_DAY  = 86400;

    public static $defaultHeaders = [
        'User-Agent'   => 'coinbasepro-php-client',
        'Accept'       => 'application/json',
        'Content-Type' => 'application/json',
    ];

    public static $productIdValues = [
        self::PRODUCT_ID_BTC_USD, self::PRODUCT_ID_BTC_GBP, self::PRODUCT_ID_BTC_EUR,
        self::PRODUCT_ID_BCH_USD, self::PRODUCT_ID_BCH_BTC, self::PRODUCT_ID_BCH_EUR,
        self::PRODUCT_ID_ETH_USD, self::PRODUCT_ID_ETH_BTC, self::PRODUCT_ID_ETH_EUR,
        self::PRODUCT_ID_LTC_USD, self::PRODUCT_ID_LTC_BTC, self::PRODUCT_ID_LTC_EUR,
        self::PRODUCT_ID_ETC_USD, self::PRODUCT_ID_ETC_EUR, self::PRODUCT_ID_ETC_BTC,
        self::PRODUCT_ID_ZRX_BTC, self::PRODUCT_ID_BTC_USDC, self::PRODUCT_ID_ETH_USDC,
        self::PRODUCT_ID_BAT_USDC, self::PRODUCT_ID_ZRX_EUR, self::PRODUCT_ID_ZRX_USD,
        self::PRODUCT_ID_CVC_USDC, self::PRODUCT_ID_DNT_USDC, self::PRODUCT_ID_LOOM_USDC,
        self::PRODUCT_ID_MANA_USDC,
    ];

    public static $timeInForceValues = [
        self::TIME_IN_FORCE_GTC, self::TIME_IN_FORCE_GTT,
        self::TIME_IN_FORCE_IOC, self::TIME_IN_FORCE_FOK,
    ];

    public static $cancelAfterValues = [
        self::CANCEL_AFTER_MIN, self::CANCEL_AFTER_HOUR, self::CANCEL_AFTER_DAY,
    ];

    public static $orderTypeValues = [
        self::ORDER_TYPE_LIMIT, self::ORDER_TYPE_MARKET, self::ORDER_TYPE_STOP,
    ];

    public static $orderSideValues = [
        self::ORDER_SIDE_BUY, self::ORDER_SIDE_SELL,
    ];

    public static $stpValues = [
        self::STP_DC, self::STP_CO, self::STP_CN, self::STP_CB,
    ];

    public static $orderStatusValues = [
        self::ORDER_STATUS_OPEN, self::ORDER_STATUS_PENDING, self::ORDER_STATUS_ACTIVE, self::ORDER_STATUS_ALL,
    ];

    public static $fundingStatusValues = [
        self::FUNDING_STATUS_OUTSTANDING, self::FUNDING_STATUS_REJECTED, self::FUNDING_STATUS_SETTLED,
    ];

    public static $currencyValues = [
        self::CURRENCY_USD, self::CURRENCY_GBP, self::CURRENCY_EUR,
        self::CURRENCY_BTC, self::CURRENCY_ETH, self::CURRENCY_LTC, self::CURRENCY_BCH,
        self::CURRENCY_ETC, self::CURRENCY_ZRX, self::CURRENCY_USDC, self::CURRENCY_BAT,
        self::CURRENCY_CVC, self::CURRENCY_DNT, self::CURRENCY_LOOM, self::CURRENCY_MANA,
    ];

    public static $marginTransferTypeValues = [
        self::MARGIN_TRANSFER_TYPE_DEPOSIT,
        self::MARGIN_TRANSFER_TYPE_WITHDRAW,
    ];

    public static $reportTypeValues = [
        self::REPORT_TYPE_FILLS, self::REPORT_TYPE_ACCOUNT,
    ];

    public static $reportFormatValues = [
        self::REPORT_FORMAT_PDF, self::REPORT_FORMAT_CSV,
    ];

    public static $granularityValues = [
        self::GRANULARITY_1_MIN, self::GRANULARITY_5_MIN, self::GRANULARITY_15_MIN,
        self::GRANULARITY_1_HOUR, self::GRANULARITY_6_HOUR,
        self::GRANULARITY_1_DAY,
    ];

}
