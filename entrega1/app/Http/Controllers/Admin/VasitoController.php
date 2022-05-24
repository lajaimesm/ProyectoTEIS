<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vasito;
use Auth;

class VasitoController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["vasitos"]= Vasito::orderBy('id', 'DESC')->get();
        return view('admin.vasitos.list')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $vasito = Vasito::findOrFail($id);
        $viewData["vasito"] = $vasito;
        return view('admin.vasitos.show')->with("viewData", $viewData);
    }

    public function register()
    {
        return view('admin.vasitos.register');
    }

    public function save(Request $request)
    {
        Vasito::validate($request);
        Vasito::create($request->only(["name","amount","price","image","discount","description"]));
        return view('admin.vasitos.upload');
    }

    public function update($id)
    {
        $viewData = [];
        $vasito = Vasito::findOrFail($id);
        $viewData["vasito"] = $vasito;
        return view('admin.vasitos.update')->with("viewData", $viewData);
    }

    public function updated(Request $request)
    {
        $data = $request->only(["id","name","amount","price","image","discount","description"]);
        $vasito = Vasito::findOrFail($data["id"]);
        foreach ($data as $key => $value) {
            $vasito[$key] = $value;
        }
        $vasito->save();
        return view('admin.vasitos.updated');
    }

    public function vasitoLowPrice()
    {
        $viewData = [];
        $vasitos = Vasito::orderBy('price')->take(3)->get();
        $viewData["vasitos"] = $vasitos;
        return view('admin.vasitos.lowPrice')->with("viewData", $viewData); 

    }

    public function destroy($id)
    {
        Vasito::destroy($id);
        return view('vastios.delete');
    }

    public function vasitoSearchPrice(Request $request)
    {
        $viewData = [];
        $max = $request->input('max');
        $min = $request->input('min');
        $viewData["vasitos"] = Vasito::query()->where('price', '>=', "{$min}")
        ->where('price', '<=', "{$max}")->get();
        return view('admin.vasitos.searchPrice')->with("viewData", $viewData);
    }

    public function vasitoSearchPriceConsult()
    {
        return view('admin.vasitos.searchPriceConsult');
    }
}