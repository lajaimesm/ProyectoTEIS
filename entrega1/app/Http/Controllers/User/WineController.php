<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wine;

class WineController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["wines"] = Wine::orderBy('id', 'DESC')->get();
        return view('wines.list')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $wine = Wine::findOrFail($id);
        $viewData["wine"] = $wine;
        return view('wines.show')->with("viewData", $viewData);
    }

    public function wineHighDiscount()
    
    {
        $viewData = [];
        $viewData["wines"] = Wine::orderBy('discount', 'DESC')->get();
        return view('wines.highDiscount')->with("viewData", $viewData);
     
    }

    public function wineNameSearch(Request $request)
    {
        $viewData = [];
        $search = $request->input('search');
        $viewData["wines"] = Wine::query()->where('name', 'LIKE', "%{$search}%")
        ->orWhere('price', 'LIKE', "%{$search}%")->get();
        return view('wines.nameSearch')->with("viewData", $viewData);
    }

    public function wineNameSearchConsult()
    {
        return view('wines.nameSearchConsult');
    }
}
