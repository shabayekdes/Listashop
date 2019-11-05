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
     * @param CategoryRepositoryInterface $category
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
        return OrderResource::collection($this->category->paginate());
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        return $this->order->update($request->all(), $order);
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
