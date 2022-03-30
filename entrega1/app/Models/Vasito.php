<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\Combo;

class Vasito extends Model
{

    /**
     * VASITO ATTRIBUTES
     * $this->attributes['id'] - int - contains the vasito primary key (id)
     * $this->attributes['name'] - string - contains the vasito name
     * $this->attributes['amount'] - int - contains the vasito amount
     * $this->attributes['price'] - float - contains the vasito price
     * $this->attributes['discount'] - float - contains the vasito discount
     * $this->attributes['image'] - string - contains the vasito image url
     * $this->attributes['description'] - string - contains the vasito description
     * $this->attributes['item_id'] - int - contains the item foreign key
     * $this->items - items - contains the associated items
     * $this->combo - combos - contains the associated combos
    */

    protected $fillable = ['name','amount','price','discount','image','description'];

    public static function validate($request)
    {
        $request->validate([
            "name" => "required|max:255",
            "amount" => "required|numeric|gte:0",
            "price" => "required|numeric|gte:0",
            "image" => "required|url",
            "discount" => "required|gte:0|max:0.99",
            "description"=> "required|max:255"
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

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
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

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
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
    
    public function combo()
    {
        return $this->hasMany(Combo::class);
    }

    public function getCombo()
    {
        return $this->combo;
    }

    public function setCombo($combo)
    {
        $this->combo = $combo;
    }
}
