<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Combo;
use App\Models\Vasito;
use App\Models\Wine;

class ComboController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["combos"]= Combo::orderBy('id', 'DESC')->get();
        return view('combos.list')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $combo = Combo::findOrFail($id);
        $viewData["vasito"] = Vasito::findOrFail($combo->getVasitoId());
        $viewData["wine"] = Wine::findOrFail($combo->getWineId());
        $viewData["combo"] = $combo;
        return view('combos.show')->with("viewData", $viewData);
    }

}
