<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Combo extends Model
{

    /*
     * COMBO ATTRIBUTES
     * $this->attributes['id'] - int - contains the combo primary key (id)
     * $this->attributes['name'] - string - contains the combo name
     * $this->attributes['amount'] - int - contains the combo amount
     * $this->attributes['price'] - float - contains the combo price
     * $this->attributes['discount'] - float - contains the combo discount
     * $this->attributes['image'] - string - contains the combo image url
     * $this->attributes['item_id'] - int - contains the item foreign key
     * $this->attributes['wine_id'] - int - contains the wine foreign key
     * $this->attributes['vasito_id'] - int - contains the vasito foreign key
     * $this->items - items - contains the associated items
     * $this->vasito - vasitos - contains the associated vasitos
     * $this->wine - wines - contains the associated wines
    */

    protected $fillable = ['name','amount','price','discount','image'];

    public static function validate($request)
    {
        $request->validate([
            "name" => "required|max:255",
            "amount" => "required|numeric|gte:0",
            "price" => "required|numeric|gte:0",
            "discount" => "required|gt:0|lt:1",
            "image" => "required|url"
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

    public function setWineId($wine_id)
    {
        $this->attributes['wine_id'] = $wine_id;
    }

    public function getWineId()
    {
        return $this->attributes['wine_id'];
    }

    public function setVasitoId($vasito_id)
    {
        $this->attributes['vasito_id'] = $vasito_id;
    }

    public function getVasitoId()
    {
        return $this->attributes['vasito_id'];
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

    public function wine()
    {
        return $this->hasMany(Wine::class);
    }

    public function getWines()
    {
        return $this->wines;
    }

    public function setWines($wines)
    {
        $this->wines = $wines;
    }
    
    public function vasito()
    {
        return $this->hasMany(Vasito::class);
    }

    public function getVasito()
    {
        return $this->vasito;
    }

    public function setVasito($vasito)
    {
        $this->vasito = $vasito;
    }
}
