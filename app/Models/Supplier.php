<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'staff_id',
        'name',
        'type',
        'phone',
        'address',
        'bank_account',
        'bank_number',
    ];

    /**
     * Define the relationship with the Staff model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    /**
     * Define the relationship with the SupplyItem model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supplyItems()
    {
        return $this->hasMany(SupplyItem::class);
    }

    /**
     * Format the supplier's bank account for display.
     *
     * @return string|null
     */
    public function getFormattedBankAccountAttribute()
    {
        return $this->bank_account ? strtoupper($this->bank_account) : null;
    }
}