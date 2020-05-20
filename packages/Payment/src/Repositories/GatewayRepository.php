<?php

namespace Payment\Repositories;

use Payment\Contracts\GatewayInterface;

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
     * @return string
     */
    public function purchase()
    {
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
