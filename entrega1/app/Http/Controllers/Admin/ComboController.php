<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;
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
        $image = new ImageController();
        $fileName = $image->store($request->file('image'));
        $data = $request->only(["name","amount","price","discount","vasitoId","wineId"]);
        $data["image"] = $fileName;
        Combo::create($data);
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
        if ($request["image"] === NULL){
            $data = $request->only(["id","name","amount","price","discount","vasito_id","wine_id"]);
            $data["image"] = $request["imageNow"];
        } else {
            $image = new ImageController();
            $fileName = $image->store($request->file('image'));
            $data = $request->only(["id","name","amount","price","discount","vasito_id","wine_id"]);
            $data["image"] = $fileName;
        }
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
