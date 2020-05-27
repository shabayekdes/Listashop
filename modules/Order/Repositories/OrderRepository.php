<?php

namespace ListaShop\Order\Repositories;

use ListaShop\Cart\Facades\Cart;
use ListaShop\Order\Models\Order;
use ListaShop\Core\Eloquent\BaseRepository;
use Illuminate\Container\Container as App;

class OrderRepository extends BaseRepository
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(App $app)
    {
        parent::__construct($app);
    }
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Order::class;
    }

    /**
     * Store order details
     *
     * @param array $data
     * @param array $error
     * @return void
     */
    public function storeOrderDetails(array $data, array $error = null)
    {
        // Insert into orders table
        $order = $this->model->create([
            'customer_first_name' => $data['name'],
            'customer_last_name' => $data['name'],
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'is_guest' => auth()->user() ? false : true,
            'grand_total' => Cart::total(),
            'item_count' => Cart::count(),
            'payment_method' => $data['payment_method'],
            'error' => $error,
        ]);

        $order->addresses()->create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'first_name' => $data['name'],
            'last_name' => $data['name'],
            'email' => $data['email'],
            'address1' => $data['address'],
            'address2' => $data['address'],
            'country' => $data['city'],
            'state' => $data['city'],
            'city' => $data['city'],
            'postcode' => $data['postalcode'],
            'phone' => $data['phone']
        ]);
        // Insert into order_product table
        foreach (Cart::content() as $item) {
            $order->products()->attach($item->model->id, ['quantity' => $item->qty, 'total' => $item->subtotal]);
        }

        return $order;
    }
    /**
     * Create a new category record in the database with image.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param Order  $user
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return User
     */
    public function update(array $data, $order): Order
    {
        $order->update($data);
        return $order;
    }
}
