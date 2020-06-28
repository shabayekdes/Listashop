<?php

namespace ListaShop\Payment\Contracts;


interface GatewayInterface
{

    /**
     * Purchase the invoice
     *
     * @return string
     */
    public function purchase($order, $data);

    /**
     * Pay the invoice
     *
     * @return mixed
     */
    public function pay();

    /**
     * Verify the payment
     *
     * @return string
     */
    public function verify();
}
