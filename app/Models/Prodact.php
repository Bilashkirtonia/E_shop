<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodact extends Model
{
    use HasFactory;
    protected $table = 'prodacts';
    protected $fillable = [
        												
        'cate_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'trending',
        'mete_title',
        'mete_descript',
        'meta_keywords',       
    ];
    public function category(){
        return $this->belongsTo(Category::class,'cate_id','id');
    }
}
