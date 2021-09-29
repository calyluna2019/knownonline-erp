<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    protected $table = "_client";

    public function ordenes(){
        return $this->hasMany(OrderModel::class, 'clientId', 'id');
    }
}
