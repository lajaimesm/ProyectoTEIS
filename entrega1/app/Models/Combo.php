


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Vasito extends Model
{
    /**
     * COMBO ATTRIBUTES
     * $this->attributes['id'] - int - contains the combo primary key (id)
     * $this->attributes['type'] - string - contains the combo name
     * $this->attributes['amount'] - int - contains the combo amount
     * $this->attributes['price'] - float - contains the combo price
     * $this->attributes['discount'] - float - contains the combo discount
    */

    protected $fillable = ['type','amount','price','discount'];

    public static function validate($request)
    {
        $request->validate([
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

    public function getDiscount()
    {
        return $this->attributes['discount'];
    }

    public function setDiscount($discount)
    {
        $this->attributes['discount'] = $discount;
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
