<?php

namespace Payment\Gateways;

use Payment\Contracts\GatewayInterface;

class PayPalExpress implements GatewayInterface
{
    /**
     * PayPalExpress Configuration.
     *
     * @var array
     */
    protected $config;

    /**
     * Create a new Redis store.
     *

     * @return void
     */
    public function __construct($config)
    {
        $this->config = $config;

    }

    /**
     * Purchase the invoice
     *
     * @return string
     */
    public function purchase()
    {
        return 'purchase';
    }

    /**
     * Pay the invoice
     *
     * @return mixed
     */
    public function pay()
    {
        return 'pay';
    }

    /**
     * Verify the payment
     *
     * @return string
     */
    public function verify()
    {
        return 'verify';
    }
}