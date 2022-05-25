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
        $viewData["items"] = [];
        foreach($order->getItems() as $item){
            if(!is_null($item->getWineId())){
                $wine = Wine::findOrFail($item->getWineId());
                array_push($viewData["items"],$wine);
            }
            if(!is_null($item->getVasitoId())){
                $vasito = Vasito::findOrFail($item->getVasitoId());
                array_push($viewData["items"],$vasito);
            }
            if(!is_null($item->getComboId())){
                $combo = Combo::findOrFail($item->getComboId());
                array_push($viewData["items"],$combo);
            }
        }
        $viewData["order"] = $order;
        return view('orders.show')->with("viewData", $viewData);
    }

}
