<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\CreateOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        $user = auth()->user()->getAuthIdentifier();
        $orders = Order::all()->where('user_id', '=', $user);
        return $this->sendResponse($orders->toArray(), 'Order list successfully');
    }


    public function create()
    {
        //
    }


    public function store(CreateOrder $request): \Illuminate\Http\JsonResponse
    {
        $order = new Order($request->validated());
        if($order->save()) {
            return $this->sendResponse($order->toArray(), 'Order create successfully');
        }
        return $this->sendError('error', 'Order create error');
    }

    public function show(int $order): \Illuminate\Http\JsonResponse
    {
        $order = Order::findOrFail($order);
        if ($order) {
            return $this->sendResponse($order->toArray(), 'Order show successfully');
        }
        return $this->sendError($order, 'Order not exist');
    }


    public function edit(Order $order)
    {
        //
    }


    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
