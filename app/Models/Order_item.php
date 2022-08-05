<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        										
        'order_id',
        'prod_id',
        'qty',
        'price',
        
               
    ];
   
    public function prodacts(): BelongsTo
    {
        return $this->belongsTo(Prodact::class, 'prod_id', 'id');
    }
}
