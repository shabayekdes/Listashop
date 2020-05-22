<?php

namespace Payment\Gateways;

use Payment\Contracts\GatewayInterface;
use Order\Models\Order;

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
     * @param Order $order
     * @param array $data
     * @return string
     */
    public function purchase($order, $data)
    {
        return true;
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