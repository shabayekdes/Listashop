<?php

namespace Shop\Http\Controllers;

use Cart\Facades\Cart;
use Order\Models\Order;
use Product\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

/**
 * Checkout page controller
 */
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop::checkout.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check race condition when there are less items available to purchase
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Sorry! One of the items in your cart is no longer avialble.');
        }

        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        try {
            $charge = Stripe::charges()->create([
                'amount' => Cart::subtotal(),
                'currency' => 'EGP',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                    'discount' => collect(session('coupon'))->toJson(),
                ],
            ]);
            $order = $this->addToOrdersTables($request, null);

            // decrease the quantities of all the products in the cart
            $this->decreaseQuantities();
            Cart::instance('default')->destroy();
            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
        } catch (CardErrorException $e) {
            $this->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }

    protected function addToOrdersTables($request, $error)
    {

        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'grand_total' => Cart::total(),
            'total_item_count' => Cart::count(),
            'error' => $error,
        ]);


        $order->addresses()->create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'first_name' => $request->name,
            'last_name' => $request->name,
            'email' => $request->email,
            'address1' => $request->address,
            'address2' => $request->address,
            'country' => $request->city,
            'state' => $request->city,
            'city' => $request->city,
            'postcode' => $request->postalcode,
            'phone' => $request->phone
        ]);
        // Insert into order_product table
        foreach (Cart::content() as $item) {
            $order->products()->attach($item->model->id, ['quantity' => $item->qty, 'total' => $item->subtotal]);
        }

        return $order;
    }

    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        }
        return false;
    }

}