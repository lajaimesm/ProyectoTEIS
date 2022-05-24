<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wine;
use App\Models\Order;
use App\Models\Item;
use App\Models\Vasito;
use Auth;

class CartController extends Controller
{
    public function addWine($id, Request $request)
    {
        $wines = $request->session()->get("wines");
        $wines [$id] = $id;
        $quantityWines = $request->session()->get("quantityWines");
        $quantityWines[$id] = $request["quantity"];
        $request->session()->put('quantityWines', $quantityWines);
        $request->session()->put('wines', $wines);
        //dd($wines,$quantityFlower);
        return back();
    }
    public function index(Request $request)
    {
        /*
        $wines = Wine::all();
        $productsInCart = [];
        $ids = $request->session()->get("wines"); //we get the ids of the products stored in session
        if ($ids) {
            $productsInCart = Wine::findMany(array_keys($ids));
        }
        $viewData = [];
        $viewData["wines"] = $wines;

        $vasitos = Vasito::all();
        $ids = $request->session()->get("vasitos"); //we get the ids of the products stored in session
        if ($ids) {
            $productsInCart = Vasito::findMany(array_keys($ids));
        }
        $viewData["vasitos"] = $vasitos;
        $viewData["productsInCart"] =$productsInCart;
        return view('admin.cart.index_admin')->with("viewData", $viewData);
*/

        $products = [];
        $idWines = $request->session()->get('wines');
        $idVasitos = $request->session()->get('vasitos');
        $quantityWine =$request->session()->get('quantityWine');
        $quantityVasito = $request->session()->get('quantityVasito');
        $acu = 0;
        if(!is_null($quantityWine)) {
            foreach (array_keys($quantityWine) as $id) {
                $obj = Wine::findOrFail($id);
                $acu = $acu + $obj->getPrice() * $quantityWine[$id];
            }
        }
        if(!is_null($quantityVasito)) {
            foreach (array_keys($quantityVasito) as $id) {
                $obj = Vasito::findOrFail($id);
                $acu = $acu + $obj->getPrice() * $quantityVasito[$id];
            }
        }     
        //dd($idWines,$quantityWine);
        if(gettype($idWines) == "array") {
            $products["wines"] = Wine::find(array_values($idWines));
        }
        if(gettype($idVasitos) == "array") {
            $products["vasitos"] = Vasito::find(array_values($idVasitos));
        }
        return view('admin.cart.index_admin')->with("viewData", $products)->with("quantityWine", $quantityWine)->with("quantityVasito", $quantityVasito);
        //dd($products);


    }

   

    public function addVasito($id, Request $request)
    {

        $vasitos = $request->session()->get("vasitos");
        $vasitos[$id] = $id;
        $request->session()->put('vasitos', $vasitos);
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
        $request->session()->forget('vasitos');
        return back();
    }
}
