<?php

namespace ListaShop\Shop\Http\Controllers;

use ListaShop\Order\Models\Order;
use App\Http\Controllers\Controller;
use ListaShop\User\Repositories\UserRepository;

/**
 * My account page controller
 */
class OrdersController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $user;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = auth()->user()->orders()->with('products')->get();
        return view('shop::account.orders')->with('orders', $orders);
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if (auth()->id() !== $order->user_id) {
            return back()->withErrors('You do not have access to this!');
        }
        $products = $order->products;
        return view('shop::account.order')->with([
            'order' => $order,
            'products' => $products,
        ]);
    }
}
