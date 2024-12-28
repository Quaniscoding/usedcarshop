<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSupplierInvoice extends Model
{
    use HasFactory;

    /**
     * Các cột có thể gán giá trị hàng loạt.
     */
    protected $fillable = [
        'order_supplier_id',
        'invoice_number',
        'invoice_date',
        'due_date',
        'total_amount',
        'tax_amount',
        'discount_amount',
        'payment_status',
        'currency',
        'notes',
    ];

    /**
     * Định dạng ngày tự động.
     */
    protected $dates = [
        'invoice_date',
        'due_date',
    ];

    /**
     * Quan hệ: Hóa đơn thuộc về một đơn hàng nhà cung cấp.
     */
    public function orderSupplier()
    {
        return $this->belongsTo(OrderSupplier::class);
    }

    /**
     * Scope: Lấy danh sách hóa đơn theo trạng thái thanh toán.
     */
    public function scopeByPaymentStatus($query, $status)
    {
        return $query->where('payment_status', $status);
    }

    /**
     * Getter: Tính toán tổng số tiền thực phải thanh toán (sau thuế và giảm giá).
     */
    public function getNetTotalAttribute()
    {
        $subTotal = $this->total_amount + $this->tax_amount - $this->discount_amount;

        return $subTotal;
    }

    /**
     * Kiểm tra trạng thái thanh toán.
     */
    public function isPaid()
    {
        return $this->payment_status === 'paid';
    }

    public function isOverdue()
    {
        return $this->due_date && $this->due_date->isPast() && $this->payment_status !== 'paid';
    }
}