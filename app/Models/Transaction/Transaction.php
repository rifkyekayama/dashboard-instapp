<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    public function customers(){
    	return $this->belongsTo('App\Models\Transaction\Customer', 'id_customer', 'customer_id');
    }
}
