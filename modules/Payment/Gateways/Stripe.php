<?php

namespace ListaShop\Payment\Gateways;

use ListaShop\Cart\Facades\Cart;
use ListaShop\Order\Models\Order;
use ListaShop\Payment\Contracts\GatewayInterface;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe as CartalystStripe;


class Stripe implements GatewayInterface
{
    /**
     * Stripe Configuration.
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
        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug . ', ' . $item->qty;
        })->values()->toJson();

        try {

            $charge = CartalystStripe::charges()->create([
                'amount' => Cart::subtotal(),
                'currency' => 'EGP',
                'source' => $data['stripe_token'],
                'description' => 'Order',
                'receipt_email' => $data['email'],
                'metadata' => [
                    'order_id' => $order->id,
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                    'discount' => collect(session('coupon'))->toJson(),
                ],
            ]);


            Cart::instance('default')->destroy();
        } catch (CardErrorException $e) {

            // return back()->withErrors('Error! ' . $e->getMessage());
            return false;
        }

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
