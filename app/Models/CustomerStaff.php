<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerStaff extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'status',
        'avatar',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
    public function scopeRole($query, $role)
    {
        return $query->where('role', $role);
    }
}