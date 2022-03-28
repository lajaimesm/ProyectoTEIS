<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Order extends Model
{

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['total'] - int - contains the total of the order
     * $this->items - items - contains the associated items
    */

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setTotal($t)
    {
        $this->attributes['total'] = $t;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
