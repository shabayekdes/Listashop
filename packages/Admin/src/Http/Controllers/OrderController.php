<?php

namespace Admin\Http\Controllers;

use Order\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Order\Http\Requests\OrderRequest;
use Order\Http\Resources\OrderResource;
use Order\Repositories\OrderRepository;

/**
 * Order Admin page controller
 */
class OrderController extends Controller
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
        return OrderResource::collection($this->order->with('products')->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        return $this->order->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order  $order

     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'order_status' => 'between:1,2'
        ]);
        return new OrderResource($this->order->update($request->all(), $order));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->order->deleteById($id);
        return ["message" => "Order delete!!"];
    }
}
