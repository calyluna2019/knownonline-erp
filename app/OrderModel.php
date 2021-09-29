<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = "_order";

    public function cliente()
    {
        return $this->belongsTo(ClientModel::class,'clientId','id');
    }

    public function productos(){
        return $this->belongsToMany(ProductModel::class,'order_items');
    }

    public function pagos(){
        return $this->belongsToMany(PaymentModel::class,'order_payments');
    }
}
