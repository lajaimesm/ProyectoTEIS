<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use App\Models\Vasito;

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
        $image = new ImageController();
        $fileName = $image->store($request->file('image'));
        $data = $request->only(["name","amount","price","discount","description"]);
        $data["image"] = $fileName;
        Vasito::create($data);
        return view('admin.vasitos.upload');
    }

    public function update($id)
    {
        $viewData = [];
        $vasito = Vasito::findOrFail($id);
        $viewData["vasito"] = $vasito;
        $viewData["image2"] = "";
        return view('admin.vasitos.update')->with("viewData", $viewData);
    }

    public function updated(Request $request)
    {   
        if ($request["image"] === NULL){
            $data = $request->only(["id","name","amount","price","discount","description"]);
            $data["image"] = $request["imageNow"];
        } else {
            $image = new ImageController();
            $fileName = $image->store($request->file('image'));
            $data = $request->only(["id","name","amount","price","discount","description"]);
            $data["image"] = $fileName;
        }
        $vasito = Vasito::findOrFail($data["id"]);
        foreach ($data as $key => $value) {
            $vasito[$key] = $value;
        }
        $vasito->save();
        return view('admin.vasitos.updated');
    }

    public function destroy($id)
    {
        Vasito::destroy($id);
        return view('admin.vasitos.delete');
    }

}
