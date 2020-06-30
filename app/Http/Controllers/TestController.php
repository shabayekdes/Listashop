<?php

namespace App\Http\Controllers;

use Cart\Facades\Cart;
use ListaShop\Order\Models\Order;
use Illuminate\Support\Arr;
use ListaShop\Product\Models\Product;
use Illuminate\Http\Request;
use Payment\Facades\Payment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Product\Http\Resources\ProductResource;
use ListaShop\Setting\Models\SettingGroup;
use ListaShop\Setting\Models\Setting;
use ListaShop\Setting\Http\Resources\SettingGroupResource;
use ListaShop\Option\Models\Option;
use ListaShop\Option\Models\OptionValue;
use ListaShop\Product\Models\ProductOption;

class TestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::with(['options'])->first();

        dd($product->options->first()->ProductOption->values);


        // $product->values()->attach([1]);

        $productOption = ProductOption::find(1);

        $productOption->values()->attach([2]);

        dd($productOption);


        $product = Product::find(1);

        $product->options()->attach(1);

        dd($product);


        // $option = Option::create([
        //     'code' => 'color',
        //     'name' => 'color',
        //     'type' => 'text',

        // ]);

        $option = Option::find(1);

        $option->values()->create([
            'value' => 'red'
        ]);
        dd($option);
        $settings = \ListaShop\Setting\Facades\Settings::get('general_default_languages', 'sss');
        dd(settings()->get('general_default_languages'));

        $settings = Setting::pluck('value', 'setting_key');
        $inputs = [
            [
                'setting_key' => 'general_settings_store_store_name',
                'setting_group_id' => '1',
                'type' => 'text',
                'attributes' => [
                    'label' => 'Store Name', // label for input
                    // optional properties
                    'placeholder' => 'Application Name', // placeholder for input
                    'class' => 'form-control', // override global input_class
                    'hint' => 'You can set the app name here' // help block text for input
                ]
            ],
            [
                'setting_key' => 'general_settings_store_contact_email',
                'setting_group_id' => '1',
                'type' => 'email',
                'attributes' => [
                    'label' => 'Contact Email', // label for input
                    // optional properties
                    'class' => 'form-control', // override global input_class
                    'hint' => 'You can set the contact email here' // help block text for input
                ]
            ],
            [
                'setting_key' => 'general_settings_store_default_language',
                'setting_group_id' => '1',
                'type' => 'email',
                'attributes' => [
                    'label' => 'Default Language', // label for input
                    // optional properties
                    'class' => 'form-control', // override global input_class
                    'options' => [
                        [
                            'value' => 'eng',
                            'text' => 'English'
                        ],
                        [
                            'value' => 'ar',
                            'text' => 'Arabic'
                        ]
                    ]
                ]
            ]
        ];
        foreach ($inputs as $input) {
            $input['attributes'] = json_encode($input['attributes']);
            Setting::create($input);
        }

        $categories = SettingGroup::whereNull('setting_group_id')
        ->with('childrenSettingGroups')
        ->get();
        $setting = SettingGroupResource::collection($categories);
        dd($setting);

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
