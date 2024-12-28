<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyItemRefurbished extends Model
{
    use HasFactory;

    /**
     * Các cột có thể gán giá trị hàng loạt.
     */
    protected $fillable = [
        'staff_id',
        'supply_item_id',
        'refurbished_price',
        'refurbished_description',
        'refurbished_date',
        'refurbished_status',
        'refurbished_images',
    ];

    /**
     * Định nghĩa thuộc tính được cast.
     */
    protected $casts = [
        'refurbished_images' => 'array', // Chuyển đổi cột JSON thành mảng
        'refurbished_date' => 'date',   // Xử lý cột ngày tháng với Carbon
    ];

    /**
     * Quan hệ: Thuộc về Staff.
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    /**
     * Quan hệ: Thuộc về SupplyItem.
     */
    public function supplyItem()
    {
        return $this->belongsTo(SupplyItem::class);
    }

    /**
     * Scope: Lọc theo trạng thái tân trang.
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('refurbished_status', $status);
    }

    /**
     * Scope: Lọc các mục được tân trang bởi một nhân viên cụ thể.
     */
    public function scopeByStaff($query, $staffId)
    {
        return $query->where('staff_id', $staffId);
    }

    /**
     * Scope: Lọc theo khoảng ngày tân trang.
     */
    public function scopeByDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('refurbished_date', [$startDate, $endDate]);
    }
}