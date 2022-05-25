<?php

namespace App\Http\Controllers;
use App\Models\Combo;
use App\Models\Vasito;
use App\Models\Wine;

class HomeController extends Controller
{



    public function index()
    {
        $viewData = [];
        $viewData["combos"]= Combo::orderBy('id', 'DESC')->get();
        $viewData["vasitos"]= Vasito::orderBy('id', 'DESC')->get();
        $viewData["wines"]= Wine::orderBy('id', 'DESC')->get();
        return view('home.index')->with('viewData',$viewData);
    }

    public function setLocale($locale)
    {
        session()->put('locale', $locale);
        return back();
    }
}
