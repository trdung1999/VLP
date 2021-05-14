<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    protected $table = "debts";

    public function user(){
        return $this->belongsTo(User::class,'product_id');
    }
    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}