<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wine;
use App\Models\Order;
use App\Models\Item;
use Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $wines = Wine::all();
        $productsInCart = [];
        $ids = $request->session()->get("wines"); //we get the ids of the products stored in session
        if ($ids) {
            $productsInCart = Wine::findMany(array_keys($ids));
        }
        $viewData = [];
        $viewData["wines"] = $wines;
        $viewData["productsInCart"] =$productsInCart;
        return view('admin.cart.index_admin')->with("viewData", $viewData);

    }

    public function add($id, Request $request)
    {
        $wines = $request->session()->get("wines");
        $wines[$id] = $id;
        $request->session()->put('wines', $wines);
        return back();
    }

    public function purchase(Request $request)
    {
        $productsInSession = $request->session()->get("wines");
        $wines = Wine::findMany(array_keys($productsInSession));
        $order = new Order();
        $order->setTotal(0);
        $order->save();
        $total = 0;
        foreach ($wines as $key => $wine) {
            $item = new Item();
            $item->setAmount(1);
            $item->setWineId($wine->getId());
            $item->setSubtotal($wine->getPrice());
            $item->setOrderId($order->getId());
            $item->setDiscount($wine->getDiscount());
            $item->save();
            $total = $total + $wine->getPrice();
        }
        $order->setTotal($total);
        $order->save();
        dd('productos comprados papi');
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('wines');
        return back();
    }
}
