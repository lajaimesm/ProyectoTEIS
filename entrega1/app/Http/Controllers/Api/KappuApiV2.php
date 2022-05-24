<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\KappuResource;

use App\Http\Controllers\Controller;

use App\Models\Vasito;

class KappuApiV2 extends Controller

{

public function index()

{

return KappuResource::collection(Vasito::all());

}

public function show($id)

{

return new KappuResource(Vasito::findOrFail($id));

}

}
