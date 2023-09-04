<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    public $table = 'users';
    
    protected $fillable = [
        'name',
        'status',
        'email',
        'password',
    ];
}
