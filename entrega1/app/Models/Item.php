<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    use HasFactory;
       /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['description'] - string - contains the comment description
     * $this->product - Product - contains the associated Product
    */

    protected $fillable = ['amount', 'wine_id'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getAmount()
    {
        return $this->attributes['amount'];
    }

    public function setAmount($amount)
    {
        $this->attributes['amount'] = $amount;
    }

    public function getSubtotal()
    {
        return $this->attributes['subtotal'];
    }

    public function setSubtotal($subtotal)
    {
        $this->attributes['subtotal'] = $subtotal;
    }

    public function getWineId()
    {
        return $this->attributes['wine_id'];
    }

    public function setWineId($pId)
    {
        $this->attributes['wine_id'] = $pId;
    }

    public function wine(){
        return $this->belongsTo(Wine::class);
    }

    public function getWine()
    {
        return $this->wine;
    }

    public function setWine($wine)
    {
        $this->wine = $wine;
    }

}