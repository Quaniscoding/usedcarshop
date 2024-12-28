<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailSupplier extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'supply_item_id',
        'quantity',
        'price',
        'total',
        'status',
        'notes',
    ];

    /**
     * Define the relationship with the Order model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Define the relationship with the SupplyItem model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplyItem()
    {
        return $this->belongsTo(SupplyItem::class);
    }

    /**
     * Calculate the total price automatically when quantity or price changes.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->total = $model->quantity * $model->price;
        });
    }

    /**
     * Scope to filter by status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}