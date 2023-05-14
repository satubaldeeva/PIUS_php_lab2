<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * get the addresses for the customer
     */
    public function  addresses(){
        return $this->hasMany(Address::class);
    }
}
