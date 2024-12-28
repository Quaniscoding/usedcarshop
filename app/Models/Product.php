<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'images',
        'description',
        'price',
        'color',
        'year',
        'origin_id',
        'location_id',
        'number_km',
        'design_id',
        'fuel',
        'gearbox',
        'number_seats',
        'is_active',
        'is_featured',
        'is_sold',
        'quantity',
        'in_stock',
        'on_sale',
        'quantity'
    ];
    protected $casts = [
        'images' => 'array',
    ];
    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }
    public function design()
    {
        return $this->belongsTo(Design::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}