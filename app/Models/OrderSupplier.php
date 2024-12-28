<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSupplier extends Model
{
    use HasFactory;

    /**
     * Các cột có thể gán giá trị hàng loạt.
     */
    protected $fillable = [
        'supplier_id',
        'staff_id',
        'order_number',
        'total_amount',
        'tax',
        'discount',
        'grand_total',
        'status',
        'notes',
        'ordered_date',
        'expected_delivery_date',
        'actual_delivery_date',
    ];

    /**
     * Định dạng ngày tự động.
     */
    protected $dates = [
        'ordered_date',
        'expected_delivery_date',
        'actual_delivery_date',
    ];

    /**
     * Quan hệ: Một đơn hàng nhà cung cấp thuộc về một nhà cung cấp.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Quan hệ: Một đơn hàng nhà cung cấp thuộc về một nhân viên.
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    /**
     * Quan hệ: Một đơn hàng nhà cung cấp có nhiều chi tiết đơn hàng.
     */
    public function details()
    {
        return $this->hasMany(OrderDetailSupplier::class);
    }

    /**
     * Scope: Lấy danh sách đơn hàng nhà cung cấp theo trạng thái.
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Getter: Tính toán tổng số tiền thực tế phải thanh toán (grand_total).
     */
    public function getComputedGrandTotalAttribute()
    {
        $subTotal = $this->total_amount - $this->discount;
        $grandTotal = $subTotal + $this->tax;

        return $grandTotal;
    }

    /**
     * Kiểm tra trạng thái đơn hàng có phải đã giao hàng xong chưa.
     */
    public function isDelivered()
    {
        return $this->status === 'delivered';
    }
}