<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Combo;
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
        $request->session()->put('wines', $wines);
        return back();
    }

    public function addVasito($id, Request $request)
    {
        $vasitos = $request->session()->get("vasitos");
        $vasitos[$id] = $id;
        $request->session()->put('vasitos', $vasitos);
        return back();
    }

    public function addCombo($id, Request $request)
    {
        $combos = $request->session()->get("combos");
        $combos[$id] = $id;
        $request->session()->put('combos', $combos);
        return back();
    }

    public function index(Request $request)
    {
        $products = [];
        $idWines = $request->session()->get('wines');
        $idVasitos = $request->session()->get('vasitos');
        $idCombos = $request->session()->get('combos');
        $acu = 0;

        if(!is_null($idVasitos)) {
            foreach ($idVasitos as $id) {
                $obj = Vasito::findOrFail($id);
                $acu = $acu + $obj->getPrice();
            }
        }
        if(!is_null($idWines)) {
            foreach ($idWines as $id) {
                $obj = Wine::findOrFail($id);
                $acu = $acu + $obj->getPrice();
            }
        }
        
        if(!is_null($idCombos)) {
            foreach ($idCombos as $id) {
                $obj = Combo::findOrFail($id);
                $acu = $acu + $obj->getPrice();
            }
        } 

        $products["total"] = $acu;
        if(gettype($idWines) == "array") {
            $products["wines"] = Wine::find(array_values($idWines));
        }
        if(gettype($idVasitos) == "array") {
            $products["vasitos"] = Vasito::find(array_values($idVasitos));
        }
        if(gettype($idCombos) == "array") {
            $products["combos"] = Combo::find(array_values($idCombos));
        }

        return view('cart.index')->with("viewData", $products);

    }


    public function purchase(Request $request)
    {
        $vasitosId = $request->session()->get("vasitos");
       
        $winesId = $request->session()->get("wines");
  
        $combosId = $request->session()->get("combos");

        if(!is_null($vasitosId) || !is_null($winesId) || !is_null($combosId)) {
            $total = 0;
            $order = new Order();
            $order->setTotal(0);
            if(Auth::check()){
                $order->setUserId(auth()->user()->id);
            } else {
                return redirect()->back();
            }
            $order->save();
            if(!is_null($vasitosId)) {
                $vasitos = Vasito::find(array_values($vasitosId));
                foreach ($vasitos as $vasito) {
                    $item = new Item();
                    $item->setOrderId($order->getId());
                    $item->setVasitoId($vasito->getId());
                    $item->setSubtotal($vasito->getPrice());
                    $item->setDiscount($vasito->getDiscount());
                    $item->setAmount(1);
                    $total += $vasito->getPrice();
                    $item->save();
                }
            }
            if(!is_null($winesId)) {
                $wines = Wine::find(array_values($winesId));
                foreach ($wines as $wine) {
                    $item = new Item();
                    $item->setOrderId($order->getId());
                    $item->setWineId($wine->getId());
                    $item->setSubtotal($wine->getPrice());
                    $item->setDiscount($wine->getDiscount());
                    $item->setAmount(1);
                    $total += $wine->getPrice();
                    $item->save();
                }
            }
            if(!is_null($combosId)) {
                $combos = Combo::find(array_values($combosId));
                foreach ($combos as $combo) {
                    $item = new Item();
                    $item->setOrderId($order->getId());
                    $item->setComboId($combo->getId());
                    $item->setSubtotal($combo->getPrice());
                    $item->setDiscount($combo->getDiscount());
                    $item->setAmount(1);
                    $total += $combo->getPrice();
                    $item->save();
                }
            }
            $order->setTotal($total);
            $order->save();
            $viewData = [];
            $viewData["order"] = $order;
            return redirect()->route('orders.show', ['id' => $order->getId()]);
        }
    }


    public function removeAll(Request $request)
    {
        $request->session()->forget('wines');
        $request->session()->forget('vasitos');
        $request->session()->forget('combos');
        return back();
    }
}
