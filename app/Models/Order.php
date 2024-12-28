<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Các cột có thể gán giá trị hàng loạt.
     */
    protected $fillable = [
        'user_id',
        'customer_id',
        'staff_id',
        'grand_total',
        'payment_method',
        'payment_status',
        'status',
        'currency',
        'shipping_amount',
        'shipping_method',
        'tracking_code',
        'delivery_date',
        'notes',
    ];

    /**
     * Định dạng ngày tự động.
     */
    protected $dates = [
        'delivery_date',
    ];

    /**
     * Quan hệ: Mỗi đơn hàng thuộc về một người dùng.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Quan hệ: Mỗi đơn hàng thuộc về một khách hàng.
     */
    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    /**
     * Quan hệ: Mỗi đơn hàng được quản lý bởi một nhân viên.
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    /**
     * Quan hệ: Một đơn hàng có nhiều chi tiết đơn hàng.
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }
}