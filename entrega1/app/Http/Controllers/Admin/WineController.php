<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use App\Models\Wine;

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
        $image = new ImageController();
        $fileName = $image->store($request->file('image'));
        $data = $request->only(["name","amount","price","discount"]);
        $data["image"] = $fileName;
        Wine::create($data);
        return view('admin.wines.upload');
    }

    public function update($id)
    {
        $viewData = [];
        $wine = Wine::findOrFail($id);
        $viewData["wine"] = $wine;
        $viewData["image2"] = "";
        return view('admin.wines.update')->with("viewData", $viewData);
    }

    public function updated(Request $request)
    {
        if ($request["image"] === NULL){
            $data = $request->only(["id","name","amount","price","discount"]);
            $data["image"] = $request["imageNow"];
        } else {
            $image = new ImageController();
            $fileName = $image->store($request->file('image'));
            $data = $request->only(["id","name","amount","price","discount"]);
            $data["image"] = $fileName;
        }
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

}
