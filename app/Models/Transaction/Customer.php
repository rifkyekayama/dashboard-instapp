<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = "customers";

    public function transactions(){
    	return $this->hasMany('App\Models\Transaction\Transaction', 'id_customer', 'customer_id');
    }
}
