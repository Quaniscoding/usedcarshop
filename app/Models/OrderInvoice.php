<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInvoice extends Model
{
    use HasFactory;

    /**
     * Các cột có thể gán giá trị hàng loạt.
     */
    protected $fillable = [
        'order_id',
        'invoice_number',
        'total_amount',
        'tax',
        'discount',
        'grand_total',
        'status',
        'issued_date',
        'due_date',
        'notes',
    ];

    /**
     * Định dạng ngày tự động.
     */
    protected $dates = [
        'issued_date',
        'due_date',
    ];

    /**
     * Quan hệ: Một hóa đơn thuộc về một đơn hàng.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
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
     * Scope: Lấy danh sách hóa đơn theo trạng thái.
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}