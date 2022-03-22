<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Wine;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $products = Wine::all();
        $productsInCart = [];
        $ids = $request->session()->get("wines"); //we get the ids of the products stored in session
        if($ids){
            $productsInCart = Wine::findMany(array_keys($ids));
        }
        $viewData = [];
        $viewData["title"] = "Cart - Online Store";
        $viewData["subtitle"] =  "Shopping Cart";
        $viewData["products"] = $products;
        $viewData["productsInCart"] =$productsInCart;

        return view('cart.index')->with("viewData",$viewData);
    }

    public function add($id, Request $request)
    {
        $products = $request->session()->get("wines");
        $products[$id] = $id;
        $request->session()->put('wines', $products);
        return back();
    }

    public function purchase(Request $request)
    {

        $productsInSession = $request->session()->get("wines");
        $products = Wine::findMany(array_keys($productsInSession));

        $order = new Order();
        $order->setTotal(0);
        $order->save();

        $total = 0;

        foreach ($products as $key => $product) {
            $item = new Wine();
            $item->exists = true;
            $order = new Order();
            $item->setId($product->getId());
            $item->setAmount( $product->getAmount() - 1);
            $item->setPrice($product->getPrice());
            $item->save();
            $total = $total + $product->getPrice();
        }

        $order->setTotal($total);
        $order->save();

        dd("Felicitaciones");
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('wines');
        return back();
    }
}
