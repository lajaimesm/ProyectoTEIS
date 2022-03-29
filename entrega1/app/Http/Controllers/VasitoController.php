<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vasito;
use App\Models\User;
use Auth;

class VasitoController extends UserController
{
    public function index()
    {
        $viewData = [];
        $viewData["vasitos"]= Vasito::orderBy('id', 'DESC')->get();
        return view('wines.list')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $vasito = Vasito::findOrFail($id);
        $viewData["vasito"] = $vasito;
        return view('vasitos.show')->with("viewData", $viewData);
    }
    public function register()
    {
        $viewData = []; //to be sent to the view
        return view('vasitos.register')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        Vasito::validate($request);
        Vasito::create($request->only(["type","amount","price"]));
        return view('vasitos.upload');
    }

    public function destroy($id)
    {
        if (Auth::user()->type =='1') {
            Vasito::destroy($id);
            return view('vastios.delete');
        }
        return back();
    }
}
