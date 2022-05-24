<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Combo;
use App\Models\Vasito;
use App\Models\Wine;
use App\Models\Item;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["orders"]= Order::orderBy('id', 'DESC')->get();
        return view('orders.list')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $order = Order::findOrFail($id);
        $viewData["order"] = $order;
        return view('orders.show')->with("viewData", $viewData);
    }

}
