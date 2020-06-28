<?php

namespace ListaShop\Shop\Http\Controllers;

use ListaShop\Cart\Facades\Cart;
use ListaShop\Product\Models\Product;
use Illuminate\Http\Request;
use ListaShop\Payment\Facades\Payment;
use App\Http\Controllers\Controller;
use ListaShop\Order\Repositories\OrderRepository;
use ListaShop\Order\Http\Requests\CheckoutRequest;
use Illuminate\Support\Str;

/**
 * Checkout page controller
 */
class CheckoutController extends Controller
{
    protected $order;

    /**
     * Order Controller constructor.
     *
     * @param OrderRepository $order
     */
    public function __construct(OrderRepository $order)
    {
        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::instance('default')->count() == 0) {
            return redirect()->route('store.index');
        }

        if (auth('customer')->user() && request()->is('guestCheckout')) {
            return redirect()->route('checkout.index');
        }

        $addresses = auth('customer')->user()->addresses;

        return view('shop::checkout.index', compact('addresses'));
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
            return back()->withErrors('Sorry! One of the items in your cart is no longer available.');
        }

        $order = $this->addToOrdersTables($request, null);
        $payment = Payment::via($request->payment_method)->purchase($order, $request->all());

        if ($payment) {

            // decrease the quantities of all the products in the cart
            $this->decreaseQuantities();
            Cart::instance('default')->destroy();
            return redirect()->route('store.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
        }

        return back()->withErrors('Sorry! Your payment have error.');
    }

    /**
     * Add order
     *
     * @param Request $request
     * @param string $error
     * @return void
     */
    protected function addToOrdersTables($request, $error)
    {
        // Insert into orders table
        $order = $this->order->create([
            'key' => Str::random(40),
            'customer_id' => auth('customer')->user() ? auth('customer')->user()->id : null,
            'customer_address_id' => $request->customer_address_id,
            'grand_total' => Cart::total(),
            'item_count' => Cart::count(),
            'payment_method' => $request->payment_method,
            'error' => $error,
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            $order->products()->attach($item->model->id, ['quantity' => $item->qty, 'total' => $item->subtotal]);
        }

        return $order;
    }

    /**
     * Decrease quantity of order
     *
     * @return void
     */
    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            $product->update(['quantity' => $product->qty - $item->qty]);
        }
    }

    /**
     * Check quantity of product Available
     *
     * @return void
     */
    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->qty < $item->qty) {
                return true;
            }
        }
        return false;
    }
}
