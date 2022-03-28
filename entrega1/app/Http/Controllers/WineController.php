<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wine;
use App\Models\User;
use Auth;

class WineController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["wines"]= Wine::orderBy('id','DESC')->get();
        if(!is_null(Auth::user()) && Auth::user()->type =='1')
            return view('wines.list')->with("viewData", $viewData);
        else 
            return view('user_wine.list')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $wine = Wine::findOrFail($id);
        $viewData["wine"] = $wine;
        if(!is_null(Auth::user()) && Auth::user()->type =='1')
            return view('wines.show')->with("viewData", $viewData);
        else 
            return view('user_wine.show')->with("viewData", $viewData);
        
    }
    public function register()
    {
        if(!is_null(Auth::user()) && Auth::user()->type =='1'){
        $viewData = []; //to be sent to the view
        return view('wines.register')->with("viewData",$viewData);
        }
        else
        return view('home.index');
    }   

    public function save(Request $request)
    {
        if(!is_null(Auth::user()) && Auth::user()->type =='1'){
            Wine::validate($request);
            Wine::create($request->only(["name","type","amount","price","discount"]));
            return view('wines.upload');
        }
        else
        return back();
    }

    public function destroy($id) 
    {   
        if(!is_null(Auth::user()) && Auth::user()->type =='1'){
        Wine::destroy($id);
        return view('wines.delete');
        }
        else
        return back();
    }
    

}