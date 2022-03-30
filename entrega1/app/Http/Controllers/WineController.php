<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wine;
use Auth;

class WineController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["wines"] = Wine::orderBy('id', 'DESC')->get();
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            return view('wines.list')->with("viewData", $viewData);
        } else {
            return view('user_wines.list')->with("viewData", $viewData);
        }
    }

    public function show($id)
    {
        $viewData = [];
        $wine = Wine::findOrFail($id);
        $viewData["wine"] = $wine;
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            return view('wines.show')->with("viewData", $viewData);
        } else {
            return view('user_wines.show')->with("viewData", $viewData);
        }
    }

    public function register()
    {
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            return view('wines.register');
        } else {
            return view('home.index');
        }
    }

    public function save(Request $request)
    {
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            Wine::validate($request);
            Wine::create($request->only(["name","amount","price","image","discount"]));
            return view('wines.upload');
        } else {
            return view('home.index');
        }
    }

    public function update($id)
    {
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            $viewData = [];
            $wine = Wine::findOrFail($id);
            $viewData["wine"] = $wine;
            return view('wines.update')->with("viewData", $viewData);
        } else {
            return view('home.index');
        }
    }

    public function updated(Request $request)
    {
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            $data = $request->only(["id","name","amount","price","image","discount"]);
            $wine = Wine::findOrFail($data["id"]);
            foreach ($data as $key => $value) {
                $wine[$key] = $value;
            }
            $wine->save();
            return view('wines.updated');
        } else {
            return view('home.index');
        }
    }

    public function destroy($id)
    {
        if (!is_null(Auth::user()) && Auth::user()->type =='1') {
            Wine::destroy($id);
            return view('wines.delete');
        } else {
            return view('home.index');
        }
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
}
