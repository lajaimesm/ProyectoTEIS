<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wine;
use Auth;

class WineController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["wines"] = Wine::orderBy('id', 'DESC')->get();
        return view('admin.wines.list')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $wine = Wine::findOrFail($id);
        $viewData["wine"] = $wine;
        return view('admin.wines.show')->with("viewData", $viewData);
    }
    public function register()
    {
        return view('admin.wines.register');

    }

    public function save(Request $request)
    {
        Wine::validate($request);
        Wine::create($request->only(["name","amount","price","image","discount"]));
        return view('admin.wines.upload');
    }

    public function update($id)
    {
        $viewData = [];
        $wine = Wine::findOrFail($id);
        $viewData["wine"] = $wine;
        return view('admin.wines.update')->with("viewData", $viewData);
    }

    public function updated(Request $request)
    {
        $data = $request->only(["id","name","amount","price","image","discount"]);
        $wine = Wine::findOrFail($data["id"]);
        foreach ($data as $key => $value) {
            $wine[$key] = $value;
        }
        $wine->save();
        return view('admin.wines.updated');
    }

    public function destroy($id)
    {
        Wine::destroy($id);
        return view('admin.wines.delete');
    }

    public function wineHighDiscount()
    
    {
        $viewData = [];
        $viewData["wines"] = Wine::orderBy('discount', 'DESC')->get();
        return view('admin.wines.highDiscount')->with("viewData", $viewData);
     
    }

    public function wineNameSearch(Request $request)
    {
        $viewData = [];
        $search = $request->input('search');
        $viewData["wines"] = Wine::query()->where('name', 'LIKE', "%{$search}%")
        ->orWhere('price', 'LIKE', "%{$search}%")->get();
        return view('admin.wines.nameSearch')->with("viewData", $viewData);
    }

    public function wineNameSearchConsult()
    {
        return view('admin.wines.nameSearchConsult');
    }
}
