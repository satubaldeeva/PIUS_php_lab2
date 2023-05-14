<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
     /**
     * get the customers that owns the address
     */
    public function  customer(){
        return $this->belongsTo(Customer::class);
    }
}
