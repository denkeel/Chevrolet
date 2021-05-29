<?php

namespace App\Http\Controllers;

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


    public function store(Request $request)
    {
        //
    }

    public function show(Order $order)
    {
        //
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
