<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class KappuCollection extends ResourceCollection

{

    public function toArray($request)

    {

        return [

            'data' => $this->collection,

            'additionalData' => [

                'storeName' => 'VASITOS',

                'storeProductsLink' => 'no hay',

            ],

        ];
    }
}
