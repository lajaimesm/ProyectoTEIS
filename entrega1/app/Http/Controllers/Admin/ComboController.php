<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Combo;
use App\Models\Vasito;
use App\Models\Wine;

class ComboController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["combos"]= Combo::orderBy('id', 'DESC')->get();
        return view('admin.combos.list')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $combo = Combo::findOrFail($id);
        $viewData["vasito"] = Vasito::findOrFail($combo->getVasitoId());
        $viewData["wine"] = Wine::findOrFail($combo->getWineId());
        $viewData["combo"] = $combo;
        return view('admin.combos.show')->with("viewData", $viewData);
    }

    public function register()
    {
        return view('admin.combos.register');
    }

    public function save(Request $request)
    {
        Combo::validate($request);
        Combo::create($request->only(["name","amount","price","image","discount","vasitoId","wineId"]));
        return view('admin.combos.upload');
    }

    public function update($id)
    {
        $viewData = [];
        $combo = Combo::findOrFail($id);
        $viewData["combo"] = $combo;
        $viewData["image2"] = "";
        return view('admin.combos.update')->with("viewData", $viewData);
    }

    public function updated(Request $request)
    {
        if ($request["image2"]!=NULL ){
            $request["image"] = $request["image2"];
        }
        $data = $request->only(["id","name","amount","price","image","discount","vasito_id","wine_id"]);
        $combo = Combo::findOrFail($data["id"]);
        foreach ($data as $key => $value) {
            $combo[$key] = $value;
        }
        $combo->save();
        return view('admin.combos.updated');
    }

    public function destroy($id)
    {
        Combo::destroy($id);
        return view('admin.combos.delete');
    }

}
