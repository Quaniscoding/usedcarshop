<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'categories',
        'brand_id',
        'name',
        'description',
        'price',
        'iss_active',
        'is_featured',
        'in_stock',
        'on_sale'
    ];
    protected $casts = [
        'images'=>'array',
    ];
    public function category(){
        return $this->belongsToMany(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function orderItems(){
        return $this->belongsToMany(OrderItem::class);
    }
}
