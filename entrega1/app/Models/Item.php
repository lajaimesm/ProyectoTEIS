<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function setQuantity($quanitity)
    {
        $this->attributes['quantity'] = $quanitity;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
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

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($order_id)
    {
        $this->attributes['order_id'] = $order_id;
    }

    public function getComboId()
    {

        return $this->attributes['combo_id'];
    }

    public function setComboId($combo_id)
    {

        $this->attributes['combo_id'] = $combo_id;
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function wine()
    {
        return $this->belongsTo(Wine::class);
    }
    
    public function vasito()
    {
        return $this->belongsTo(Vasito::class);
    }

    public function combo()
    {
        return $this->belongsTo(Combo::class);
    }

}