<?php

namespace Payment;

use Payment\Gateways\COD;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Payment\Gateways\PayPalExpress;
use Payment\Contracts\GatewayInterface;
use Payment\Gateways\Stripe;
use Payment\Repositories\GatewayRepository;

class PaymentManager
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * Payment Driver Name.
     *
     * @var string
     */
    protected $driver;

    /**
     * The array of resolved cache stores.
     *
     * @var array
     */
    protected $stores = [];

    /**
     * Create a new Payment manager instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Set the value of driver
     *
     * @param $driver
     *
     * @return $this
     */
    public function via($name)
    {
        return $this->stores[$name] = $this->get($name);
    }

    /**
     * Attempt to get the store from the local cache.
     *
     * @param  string  $name
     * @return \Illuminate\Contracts\Cache\Repository
     */
    protected function get($name)
    {
        return $this->stores[$name] ?? $this->resolve($name);
    }

    /**
     * Resolve the given store.
     *
     * @param  string  $name
     *
     * @throws \InvalidArgumentException
     */
    protected function resolve($name)
    {
        $config = $this->getConfig($name);

        if (is_null($config)) {
            throw new InvalidArgumentException("Payment gateway [{$name}] is not defined.");
        }

        $driver = Str::studly($config['driver']);
        $driverMethod = "create${driver}Driver";

        if (method_exists($this, $driverMethod)) {
            return $this->{$driverMethod}($config);
        } else {
            throw new InvalidArgumentException("Driver [{$config['driver']}] is not supported.");
        }

    }

    /**
     * Create an instance of the Cash On Delivery payment driver.
     *
     * @param  array  $config
     * @return GatewayRepository
     */
    protected function createCashOnDeliveryDriver(array $config)
    {
        return $this->repository(new COD($config));
    }

    /**
     * Create an instance of the PayPal Express payment driver.
     *
     * @param  array  $config
     * @return GatewayRepository
     */
    protected function createPayPalExpressDriver(array $config)
    {
        return $this->repository(new PayPalExpress($config));
    }

    /**
     * Create an instance of the Stripe payment driver.
     *
     * @param  array  $config
     * @return GatewayRepository
     */
    protected function createStripeDriver(array $config)
    {
        return $this->repository(new Stripe($config));
    }

    /**
     * Create a new cache repository with the given implementation.
     *
     * @param  GatewayInterface  $store
     * @return GatewayRepository
     */
    public function repository(GatewayInterface $store)
    {
        return new GatewayRepository($store);
    }

    /**
     * Purchase the payment
     *
     * @return $this
     * @throws \Exception
     */
    public function purchase()
    {
        $this->driverInstance = $this->getFreshDriverInstance();

        //purchase the invoice
        $transactionId = $this->driverInstance->purchase();
        if ($finalizeCallback) {
            call_user_func_array($finalizeCallback, [$this->driverInstance, $transactionId]);
        }

        // dispatch event
        event(
            new InvoicePurchasedEvent(
                $this->driverInstance,
                $this->driverInstance->getInvoice()
            )
        );

        return $this;
    }

    /**
     * Get new driver instance
     *
     * @return mixed
     * @throws \Exception
     */
    protected function getFreshDriverInstance()
    {

        $class = $this->config['map'][$this->driver];

        if (!empty($this->callbackUrl)) { // use custom callbackUrl if exists
            $this->settings['callbackUrl'] = $this->callbackUrl;
        }

        return new $class($this->invoice, $this->settings);
    }

    /**
     * Get the cache connection configuration.
     *
     * @param  string  $name
     * @return array
     */
    protected function getConfig($name)
    {
        return $this->app['config']["payment.gateways.{$name}"];
    }
}
