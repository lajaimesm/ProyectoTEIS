<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wine;
use App\Models\User;
use Auth;

class WineController extends UserController
{
    public function index()
    {
        $viewData = [];
        $viewData["wines"]= Wine::orderBy('id','DESC')->get();
        return view('wines.list')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $wine = Wine::findOrFail($id);
        $viewData["wine"] = $wine;
        return view('wines.show')->with("viewData", $viewData);
    }
    public function register()
    {
        $viewData = []; //to be sent to the view
        return view('wines.register')->with("viewData",$viewData);
    }   

    public function save(Request $request)
    {
        Wine::validate($request);
        Wine::create($request->only(["type","amount","price"]));
        return view('wines.upload');
    }

    public function destroy($id) 
    {   
        if(Auth::user()->type =='1'){
            Wine::destroy($id);
            return view('wines.delete');
        }
        return back();
    }
    

}