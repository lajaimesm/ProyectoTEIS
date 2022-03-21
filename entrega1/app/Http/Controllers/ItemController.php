<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class ItemController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["wines"]= Item::orderBy('id','DESC')->get();
        return view('wines.list')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $wine = Item::findOrFail($id);
        $viewData["wine"] = $wine;
        return view('wines.show')->with("viewData", $viewData);
    }

}