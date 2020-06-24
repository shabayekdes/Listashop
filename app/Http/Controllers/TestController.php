<?php

namespace App\Http\Controllers;

use Cart\Facades\Cart;
use ListaShop\Order\Models\Order;
use Illuminate\Support\Arr;
use Product\Models\Product;
use Illuminate\Http\Request;
use Payment\Facades\Payment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Product\Http\Resources\ProductResource;
use ListaShop\Setting\Models\SettingGroup;

class TestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = SettingGroup::whereNull('setting_group_id')
        ->with('childrenSettingGroups')
        ->get();
        dd($categories);

        dd(trans('settings::settings.tabs.general'));
        $order = Order::find(1);
        dd($order->address);
        dd(app());
        $paymentMethodLabel = [
        1 => 'cod',
        2 => 'stripe',
        3 => 'paypal'
    ];
               $method = Arr::get($paymentMethodLabel, '1');

               dd($method);

        // dd(config('payment.gateways.COD'));
        $cache = Cache::get('test');
        $payment = Payment::via('paypal')->pay();

        dd($payment);

        dd(Storage::exists('public/products/15/product-15.png'));
        $product = Product::find(1);
        $option = $product->options()->first();
        dd($option);

        dd($option, $option->option()->first(), $option->values()->get());

        $price = 8759;
        $new_price = 1980;
        $discount = (int) 100 - ceil($new_price * 100 / $price) . "%";

        dd($discount);


        $product = Product::with('flat', 'images', 'options', 'options.attribute')->where('id', 1)->first();

        dd($product->attributes()->get());
        return new ProductResource($product);


        $child = $product->children()->create([
            'sku'  => 'sadasdasdasd',
            'type' => 'simple',
            'slug' => 'sdadasdasd',
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
