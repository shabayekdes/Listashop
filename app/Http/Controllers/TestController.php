<?php

namespace App\Http\Controllers;

use Cart\Facades\Cart;
use Order\Models\Order;
use Product\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Product\Http\Resources\ProductResource;

class TestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::with('flat','images','options','options.attribute')->where('id', 1)->first();

        dd($product->attributes()->get());
        return new ProductResource($product);


        $child = $product->children()->create([
            'sku'  =>'sadasdasdasd',
            'type'=>'simple',
            'slug'=>'sdadasdasd',
            'categories_id' => 1
        ]);

        dd($child);

        $product->options()->attach(2);




        Cart::add(1, 'Shabayekdes', 1, 2541)
            ->associate('Product\Models\Product');

        dd(Cart::content());

        dd(File::exists('img/products/4.jpeg'));

        $test = Product::get(['id']);

        dd($test);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        // Insert into orders table
        $order = Order::create([
            'user_id' => 1,
            'grand_total' => Cart::subtotal(),
            'total_item_count' => Cart::count(),
            'error' => null,
        ]);


        $order->addresses()->create([
            'user_id' => 1,
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
            $order->product()->attach($item->model->id, ['quantity' => $item->qty, 'total' => $item->subtotal]);
        }

        return $order;
    }
}