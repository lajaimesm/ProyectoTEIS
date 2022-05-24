<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\KappuCollection;

use App\Http\Controllers\Controller;

use App\Models\Vasito;

class KappuApiV3 extends Controller

{

    public function index()

    {

        return new KappuCollection(Vasito::all());
    }

    public function paginate()

    {

        return new KappuCollection(Vasito::paginate(5));
    }
}
