<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Safekeeping extends Model
{
    protected $table = 'safekeeping';
    protected $fillable = ['user_code', 'person_name', 'amount', 'currency'];
}
