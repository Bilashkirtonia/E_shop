<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $nullable = [
        'user_id',
        'prod_id',
        'qty_id',
    ];
    public function product(){
        return $this->belongsTo(Prodact::class,'prod_id','id');
    }
}
