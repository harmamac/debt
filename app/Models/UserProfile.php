<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';
    protected $primaryKey = 'user_code';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'user_code',
        'store_name',
        'enabled_currencies'
    ];
    
    protected $casts = [
        'enabled_currencies' => 'array'
    ];
}