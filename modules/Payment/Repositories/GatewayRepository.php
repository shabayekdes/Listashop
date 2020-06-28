<?php

namespace ListaShop\Payment\Repositories;

use ListaShop\Order\Models\Order;
use ListaShop\Payment\Contracts\GatewayInterface;

class GatewayRepository
{
    /**
     * The cache store implementation.
     *
     * @var GatewayInterface
     */
    protected $store;

    /**
     * Create a new gateway repository instance.
     *
     * @param  GatewayInterface  $store
     * @return void
     */
    public function __construct(GatewayInterface $store)
    {
        $this->store = $store;
    }

    /**
     * Purchase the invoice
     *
     * @param Order $order
     * @param array $data
     * @return string
     */
    public function purchase(Order $order, $data)
    {
        return $this->store->purchase($order, $data);
    }

    /**
     * Pay the invoice
     *
     * @return mixed
     */
    public function pay()
    {
        return $this->store->pay();
    }

    /**
     * Verify the payment
     *
     * @return string
     */
    public function verify()
    {
    }
}
