<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersManagement extends Model
{
    use HasFactory;

    protected $table = 'users_management';

    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'position',
        'is_active',
        'last_login_at'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'last_login_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
