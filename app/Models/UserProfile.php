<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'phone',
        'emergency_contact',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}