<?php declare(strict_types = 1);

namespace CoinbasePro\Clients;

use CoinbasePro\Interfaces\ResponseTypeInterface;
use CoinbasePro\Security\Auth;
use CoinbasePro\Security\RequestSigner;
use CoinbasePro\Types\Request\Authenticated\Account as RequestAccount;
use CoinbasePro\Types\Request\Authenticated\AccountPaginated as RequestAccountPaginated;
use CoinbasePro\Types\Request\Authenticated\Deposit as RequestDeposit;
use CoinbasePro\Types\Request\Authenticated\Fill as RequestFill;
use CoinbasePro\Types\Request\Authenticated\Funding as RequestFunding;
use CoinbasePro\Types\Request\Authenticated\ListOrders as RequestListOrders;
use CoinbasePro\Types\Request\Authenticated\MarginTransfer as RequestMarginTransfer;
use CoinbasePro\Types\Request\Authenticated\Order as RequestOrder;
use CoinbasePro\Types\Request\Authenticated\Position as RequestPosition;
use CoinbasePro\Types\Request\Authenticated\Report as RequestReport;
use CoinbasePro\Types\Request\Authenticated\Withdrawal as RequestWithdrawal;
use CoinbasePro\Types\Response\Authenticated\Account as ResponseAccount;
use CoinbasePro\Types\Response\Authenticated\CoinbaseAccount as ResponseCoinbaseAccount;
use CoinbasePro\Types\Response\Authenticated\Deposit as ResponseDeposit;
use CoinbasePro\Types\Response\Authenticated\Fill as ResponseFill;
use CoinbasePro\Types\Response\Authenticated\Funding as ResponseFunding;
use CoinbasePro\Types\Response\Authenticated\Hold as ResponseHold;
use CoinbasePro\Types\Response\Authenticated\Ledger as ResponseLedger;
use CoinbasePro\Types\Response\Authenticated\MarginTransfer as ResponseMarginTransfer;
use CoinbasePro\Types\Response\Authenticated\Order as ResponseOrder;
use CoinbasePro\Types\Response\Authenticated\PaymentMethods as ResponsePaymentMethods;
use CoinbasePro\Types\Response\Authenticated\Position as ResponsePosition;
use CoinbasePro\Types\Response\Authenticated\Report as ResponseReport;
use CoinbasePro\Types\Response\Authenticated\TrailingVolume as ResponseTrailingVolume;
use CoinbasePro\Types\Response\Authenticated\Withdrawal as ResponseWithdrawal;
use CoinbasePro\Types\Response\RawData;
use CoinbasePro\Types\Response\ResponseContainer;

/**
 * Class AuthenticatedClient
 *
 * @author Benjamin Franke
 */
class AuthenticatedClient extends PublicClient {

    protected $key;
    protected $b64secret;
    protected $passphrase;
    protected $auth;

    public function __construct(string $key, string $b64secret, string $passphrase) {
        $this->setAuth(new Auth($key, $b64secret, $passphrase));
    }

    public function request(string $method, array $uriParts, array $options = [], array $headers = []): array {

        $requestSigner = new RequestSigner($this->getAuth(), $method, $uriParts, $options);
        $headers = array_merge($headers, $requestSigner->getHeaders());

        return parent::request($method, $uriParts, $options, $headers);

    }

    public function getAuth(): Auth {
        return $this->auth;
    }

    private function setAuth(Auth $auth): self {
        $this->auth = $auth;
        return $this;
    }

    /**
     * Get a list of trading accounts.
     */
    public function getAccounts(): ResponseContainer {
        return $this->get(['accounts'], ResponseAccount::class);
    }

    /**
     * Information for a single account. Use this endpoint when you know the account_id.
     */
    public function getAccount(RequestAccount $account): ResponseContainer {
        return $this->get(['accounts', $account->getId()], ResponseAccount::class);
    }

    /**
     * List account activity. Account activity either increases or decreases your account balance.
     * Items are paginated and sorted latest first.
     * See the Pagination section for retrieving additional entries after the first page.
     */
    public function getAccountHistory(RequestAccountPaginated $account): ResponseContainer {
        return $this->get(['accounts', $account->getId(), 'ledger'], ResponseLedger::class, $account->toArray());
    }

    /**
     * Holds are placed on an account for any active orders or pending withdraw requests.
     * As an order is filled, the hold amount is updated.
     * If an order is canceled, any remaining hold is removed.
     * For a withdraw, once it is completed, the hold is removed.
     */
    public function getAccountHolds(RequestAccountPaginated $account): ResponseContainer {
        return $this->get(['accounts', $account->getId(), 'holds'], ResponseHold::class, $account->toArray());
    }

    /**
     * Place a New Order
     *
     * You can place different types of orders: limit, market, and stop.
     * Orders can only be placed if your account has sufficient funds.
     * Once an order is placed, your account funds will be put on hold for the duration of the order.
     * How much and which funds are put on hold depends on the order type and parameters specified.
     */
    public function placeOrder(RequestOrder $order): ResponseContainer {
        return $this->post(['orders'], ResponseOrder::class, $order->toArray());
    }

    /**
     * Cancel an Order
     *
     * Cancel a previously placed order.
     * If the order had no matches during its lifetime its record may be purged.
     * This means the order details will not be available with GET /orders/<order-id>.
     */
    public function cancelOrder(RequestOrder $order): ResponseContainer {
        return $this->delete(['orders', $order->getId()], RawData::class);
    }

    /**
     * Cancel all
     *
     * With best effort, cancel all open orders. The response is a list of ids of the canceled orders.
     */
    public function cancelOrders(?RequestOrder $order = null): ResponseContainer {
        return $this->delete(['orders'], RawData::class, ($order !== null) ? $order->toArray() : []);
    }

    /**
     * List your current open orders. Only open or un-settled orders are returned.
     * As soon as an order is no longer open and settled, it will no longer appear in the default request.
     */
    public function getOrders(RequestListOrders $listOrders): ResponseContainer {
        return $this->get(['orders'], ResponseOrder::class, $listOrders->toArray());
    }

    /**
     * Get a single order by order id.
     */
    public function getOrder(RequestOrder $order): ResponseContainer {
        return $this->get(['orders', $order->getId()], ResponseOrder::class);
    }

    /**
     * Get a list of recent fills.
     */
    public function getFills(?RequestFill $fill = null): ResponseContainer {
        return $this->get(['fills'], ResponseFill::class, ($fill !== null) ? $fill->toArray() : []);
    }

    /**
     * List Fundings
     */
    public function getFundings(?RequestFunding $funding = null): ResponseContainer {
        return $this->get(['funding'], ResponseFunding::class, ($funding !== null) ? $funding->toArray() : []);
    }

    /**
     * Repay funding. Repays the older funding records first.
     */
    public function repay(RequestFunding $funding): ResponseContainer {
        return $this->post(['funding', 'repay'], RawData::class, $funding->toArray());
    }

    /**
     * Margin Transfer
     *
     * Transfer funds between your standard/default profile and a margin profile.
     * A deposit will transfer funds from the default profile into the margin profile.
     * A withdraw will transfer funds from the margin profile to the default profile.
     * Withdraws will fail if they would set your margin ratio below the initial margin ratio requirement.
     */
    public function marginTransfer(RequestMarginTransfer $marginTransfer): ResponseContainer {
        return $this->post(['profiles', 'margin-transfer'], ResponseMarginTransfer::class, $marginTransfer->toArray());
    }

    /**
     * An overview of your profile.
     */
    public function getPosition(): ResponseContainer {
        return $this->get(['position'], ResponsePosition::class);
    }

    /**
     * Close position
     */
    public function closePosition(RequestPosition $position): ResponseContainer {
        return $this->post(['position', 'close'], RawData::class, $position->toArray());
    }

    /**
     * Deposit funds from a payment method. See the Payment Methods section for retrieving your payment methods.
     */
    public function depositPaymentMethod(RequestDeposit $deposit): ResponseContainer {
        return $this->post(['deposits', 'payment-method'], ResponseDeposit::class, $deposit->toArray());
    }

    /**
     * Deposit funds from a coinbase account.
     * You can move funds between your Coinbase accounts and your GDAX trading accounts within your daily limits.
     * Moving funds between Coinbase and GDAX is instant and free.
     * See the Coinbase Accounts section for retrieving your Coinbase accounts.
     */
    public function depositCoinbase(RequestDeposit $deposit): ResponseContainer {
        return $this->post(['deposits', 'coinbase-account'], ResponseDeposit::class, $deposit->toArray());
    }

    /**
     * Withdraw funds to a payment method. See the Payment Methods section for retrieving your payment methods.
     *
     * @param RequestWithdrawal $withdrawal
     *
     * @return ResponseTypeInterface
     */
    public function withdrawPaymentMethod(RequestWithdrawal $withdrawal): ResponseContainer {
        return $this->post(['withdrawals', 'payment-method'], ResponseDeposit::class, $withdrawal->toArray());
    }

    /**
     * Withdraw funds to a coinbase account.
     * You can move funds between your Coinbase accounts and your GDAX trading accounts within your daily limits.
     * Moving funds between Coinbase and GDAX is instant and free.
     * See the Coinbase Accounts section for retrieving your Coinbase accounts.
     */
    public function withdrawCoinbase(RequestWithdrawal $withdrawal): ResponseContainer {
        return $this->post(['withdrawals', 'coinbase'], ResponseWithdrawal::class, $withdrawal->toArray());
    }

    /**
     * Withdraws funds to a crypto address.
     */
    public function withdrawCrypto(RequestWithdrawal $withdrawal): ResponseContainer {
        return $this->post(['withdrawals', 'crypto'], ResponseWithdrawal::class, $withdrawal->toArray());
    }

    /**
     * Get a list of your payment methods.
     */
    public function getPaymentMethods(): ResponseContainer {
        return $this->get(['payment-methods'], ResponsePaymentMethods::class);
    }

    /**
     * Get a list of your coinbase accounts.
     * Visit the Coinbase accounts API for more information.
     */
    public function getCoinbaseAccounts(): ResponseContainer {
        return $this->get(['coinbase-accounts'], ResponseCoinbaseAccount::class);
    }

    public function getReports(): ResponseContainer {
        return $this->get(['reports'], ResponseReport::class);
    }

    /**
     * Reports provide batches of historic information about your account in various human and machine readable forms.
     */
    public function getReport(RequestReport $report): ResponseContainer {
        return $this->get(['reports', $report->getId()], ResponseReport::class);
    }

    /**
     * This request will return your 30-day trailing volume for all products.
     * This is a cached value that’s calculated every day at midnight UTC.
     */
    public function getTrailingVolume(): ResponseContainer {
        return $this->get(['users', 'self', 'trailing-volume'], ResponseTrailingVolume::class);
    }

}
