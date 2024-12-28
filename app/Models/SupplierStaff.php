<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierStaff extends Model
{
    use HasFactory;

    /**
     * Các cột có thể gán giá trị hàng loạt.
     */
    protected $fillable = [
        'staff_id',
        'supplier_id',
        'name',
        'first_name',
        'last_name',
        'phone',
        'branch',
        'birthday',
        'province',
    ];

    /**
     * Định dạng ngày tự động.
     */
    protected $dates = [
        'birthday',
    ];

    /**
     * Quan hệ: SupplierStaff thuộc về Staff.
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    /**
     * Quan hệ: SupplierStaff thuộc về Supplier.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Getter: Lấy họ và tên đầy đủ của nhân viên nhà cung cấp.
     */
    public function getFullNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

    /**
     * Scope: Lọc nhân viên theo tỉnh/thành phố.
     */
    public function scopeByProvince($query, $province)
    {
        return $query->where('province', $province);
    }

    /**
     * Scope: Lọc nhân viên theo chi nhánh.
     */
    public function scopeByBranch($query, $branch)
    {
        return $query->where('branch', $branch);
    }
}