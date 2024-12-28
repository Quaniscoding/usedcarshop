<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    /**
     * Các cột có thể gán giá trị hàng loạt.
     */
    protected $fillable = [
        'order_id',
        'supply_item_id',
        'quantity',
        'price',
        'discount',
        'status',
        'notes',
    ];

    /**
     * Quan hệ: Chi tiết đơn hàng thuộc về một đơn hàng.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Quan hệ: Chi tiết đơn hàng liên kết với một sản phẩm được cung cấp.
     */
    public function supplyItem()
    {
        return $this->belongsTo(SupplyItem::class);
    }

    /**
     * Tính toán tổng giá trị của chi tiết đơn hàng (giá * số lượng - chiết khấu).
     */
    public function getTotalAttribute()
    {
        return ($this->price * $this->quantity) - $this->discount;
    }
}