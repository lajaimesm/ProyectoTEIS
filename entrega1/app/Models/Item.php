<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vasito;
use App\Models\Combo;
use App\Models\Wine;
use App\Models\Order;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['amount'] - int - contains the item amount
     * $this->attributes['subtotal'] - float - contains the subtotal
     * $this->attributes['discount'] - float - contains the discount
     * $this->attributes['vasito_id'] - int - contains the vasito foreign key
     * $this->attributes['order_id'] - int - contains the order foreign key
     * $this->attributes['wine_id'] - int - contains the wine foreign key
     * $this->attributes['combo_id'] - int - contains the combo foreign key
     * $this->order - order - contains the associated order
     * $this->vasitos - vasitos - contains the associated vasitos
     * $this->wines - wines - contains the associated wines
     * $this->combos - combos - contains the associated combos
    */

    protected $fillable = ['amount', 'subtotal', 'discount', 'order_id'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getSubtotal()
    {
        return $this->attributes['subtotal'];
    }

    public function setSubtotal($subtotal)
    {
        $this->attributes['subtotal'] = $subtotal;
    }

    public function setAmount($amount)
    {
        $this->attributes['amount'] = $amount;
    }

    public function getAmount()
    {
        return $this->attributes['amount'];
    }

    public function setDiscount($discount)
    {
        $this->attributes['discount'] = $discount;
    }

    public function getDiscount()
    {
        return $this->attributes['discount'];
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

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function wine()
    {
        return $this->hasMany(Wine::class);
    }
    
    public function vasito()
    {
        return $this->hasMany(Vasito::class);
    }

    public function combo()
    {
        return $this->hasMany(Combo::class);
    }
}
