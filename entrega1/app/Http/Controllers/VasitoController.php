<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vasito;
use Auth;

class VasitoController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["vasitos"]= Vasito::orderBy('id', 'DESC')->get();
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            return view('vasitos.list')->with("viewData", $viewData);
        } else {
            return view('user_vasitos.list')->with("viewData", $viewData);
        }
    }

    public function show($id)
    {
        $viewData = [];
        $vasito = Vasito::findOrFail($id);
        $viewData["vasito"] = $vasito;
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            return view('vasitos.show')->with("viewData", $viewData);
        } else {
            return view('user_vasitos.show')->with("viewData", $viewData);
        }
    }

    public function register()
    {
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            return view('vasitos.register');
        } else {
            return view('home.index');
        }
    }

    public function save(Request $request)
    {
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            Vasito::validate($request);
            Vasito::create($request->only(["name","amount","price","image","discount","description"]));
            return view('vasitos.upload');
        } else {
            return view('home.index');
        }
    }

    public function update($id)
    {
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            $viewData = [];
            $vasito = Vasito::findOrFail($id);
            $viewData["vasito"] = $vasito;
            return view('vasitos.update')->with("viewData", $viewData);
        } else {
            return view('home.index');
        }
    }

    public function updated(Request $request)
    {
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            $data = $request->only(["id","name","amount","price","image","discount","description"]);
            $vasito = Vasito::findOrFail($data["id"]);
            foreach ($data as $key => $value) {
                $vasito[$key] = $value;
            }
            $vasito->save();
            return view('vasitos.updated');
        } else {
            return view('home.index');
        }
    }

    public function vasitoLowPrice()
    {
        $viewData = [];
        $vasitos = Vasito::orderBy('price')->take(3)->get();
        $viewData["vasitos"] = $vasitos;
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            return view('vasitos.lowPrice')->with("viewData", $viewData);
        }else {
            return view('vasitos.lowPrice')->with("viewData", $viewData);
        }
        
    }

    public function destroy($id)
    {
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            Vasito::destroy($id);
            return view('vastios.delete');
        } else {
            return view('home.index');
        }
    }

    public function vasitoSearchPrice(Request $request)
    {
        $viewData = [];
        $max = $request->input('max');
        $min = $request->input('min');
        $viewData["vasitos"] = Vasito::query()->where('price', '>=', "{$min}")
        ->where('price', '<=', "{$max}")->get();
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            return view('vasitos.searchPrice')->with("viewData", $viewData);
        } else{
            return view('user_vasitos.searchPrice')->with("viewData", $viewData);;
        }

    }

    public function vasitoSearchPriceConsult()
    {
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            return view('vasitos.searchPriceConsult');
        } else {
            return view('user_vasitos.searchPriceConsult');
        }
    }
}
