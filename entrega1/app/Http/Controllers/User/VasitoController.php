<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vasito;

class VasitoController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["vasitos"]= Vasito::orderBy('id', 'DESC')->get();
        return view('vasitos.list')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $vasito = Vasito::findOrFail($id);
        $viewData["vasito"] = $vasito;
        return view('vasitos.show')->with("viewData", $viewData);
    }

    public function vasitoLowPrice()
    {
        $viewData = [];
        $vasitos = Vasito::orderBy('price')->take(3)->get();
        $viewData["vasitos"] = $vasitos;
        return view('vasitos.lowPrice')->with("viewData", $viewData); 

    }

    public function vasitoSearchPrice(Request $request)
    {
        $viewData = [];
        $max = $request->input('max');
        $min = $request->input('min');
        $viewData["vasitos"] = Vasito::query()->where('price', '>=', "{$min}")
        ->where('price', '<=', "{$max}")->get();
        return view('vasitos.searchPrice')->with("viewData", $viewData);
    }

    public function vasitoSearchPriceConsult()
    {
        return view('vasitos.searchPriceConsult');
    }
}