<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Wine extends Model
{

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['type'] - string - contains the product type
     * $this->attributes['amount'] - int - contains the product amount
     * $this->attributes['price'] - float - contains the product price
    */

    protected $fillable = ['name','type','amount','price','discount'];

    public static function validate($request)
    {
        $request->validate([
            "name" => "required",
            "type" => "required",
            "amount" => "required",
            "price" => "required",
            "discount" => "required"
        ]);
    }
    public function getId()
    {
        return $this->attributes['id'];
    }

   
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getType()
    {
        return $this->attributes['type'];
    }

    public function setType($type)
    {
        $this->attributes['type'] = $type;
    }

    public function getAmount()
    {
        return $this->attributes['amount'];
    }

    public function setAmount($amount)
    {
        $this->attributes['amount'] = $amount;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }


}
