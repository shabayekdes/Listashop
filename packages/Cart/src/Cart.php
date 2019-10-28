<?php

namespace Cart;

class Cart
{
    public $items = [];
    public $totalQty ;
    public $totalPrice;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __Construct($cart = null) {
        if($cart) {
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        } else {
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }
    /**
     * Add Items in a cart with some cart and item details.
     *
     * @param Product   $product
     *
     * @return void
     */
    public function add($product) {

        $item = [
            'name' => $product->name,
            'price' => $product->price,
            'qty' => 0,
            'thumbnail' => $product->thumbnail,
        ];
        if( !array_key_exists($product->id, $this->items)) {
            $this->items[$product->id] = $item ;
            $this->totalQty +=1;
            $this->totalPrice += $product->price;
        } else {
            $this->totalQty +=1 ;
            $this->totalPrice += $product->price;
        }
        $this->items[$product->id]['qty']  += 1 ;
    }
    /**
     * Returns cart
     *
     * @return mixed
     */
    public function getCart()
    {
        $cart = null;
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        }

        return $cart;
    }
}