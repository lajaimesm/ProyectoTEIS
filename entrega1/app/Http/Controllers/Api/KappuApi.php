<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Vasito;

class KappuApi extends Controller
{
    public function index()
    {
        return Vasito::all();
    }

    public function show($id)
    {
        return Vasito::findOrFail($id);
    }


}


