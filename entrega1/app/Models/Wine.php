<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\Combo;

class Wine extends Model
{

    /**
     * WINES ATTRIBUTES
     * $this->attributes['id'] - int - contains the wine primary key (id)
     * $this->attributes['name'] - string - contains the wine name
     * $this->attributes['amount'] - int - contains the wine amount
     * $this->attributes['price'] - float - contains the wine price
     * $this->attributes['image'] - string - contains the wine url image
     * $this->attributes['discount'] - float - contains the wine discount
     * $this->attributes['type'] - string - contains the wine type
     * $this->attributes['item_id'] - int - contains the item foreign key
     * $this->attributes['combo_id'] - int - contains the combo foreign key
     * $this->items - items - contains the associated items
     * $this->combo - combos - contains the associated combos
    */

    protected $fillable = ['name','amount','price','image','discount'];

    public static function validate($request)
    {
        $request->validate([
            "name" => "required|max:255",
            "amount" => "required|numeric|gte:0",
            "price" => "required|numeric|gte:0",
            "image" => "required",
            "discount" => "required|gte:0|max:0.99"
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

    public function getType()
    {
        return $this->attributes['type'];
    }

    public function setType($type)
    {
        $this->attributes['type'] = $type;
    }

    public function getItemId()
    {
        return $this->attributes['id'];
    }

    public function setItemId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getComboId()
    {
        return $this->attributes['id'];
    }

    public function setComboId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function item()
    {
        return $this->belongsToMany(Item::class);
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
        return $this->belongsToMany(Combo::class);
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
