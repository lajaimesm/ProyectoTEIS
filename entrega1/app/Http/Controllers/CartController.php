<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wine;
use App\Models\Order;
use App\Models\Item;
use Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::all();
        $productsInCart = [];
        $productsInSession = $request->session()->get("items"); //we get the ids of the beers stored in session
        $productsItems = [];
        if ($productsInSession) {
            $productsInCart = Item::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $item) {
                array_push($productsItems, ['wines' => $item, 'quantity' => $productsInSession[$item['id']]]);
            }
        }
        $viewData = [];
        $viewData["items"] = $items;
        $viewData["productsInCart"] =$productsInCart;
        $viewData["total"] = $this->getTotal($productsItems);

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
