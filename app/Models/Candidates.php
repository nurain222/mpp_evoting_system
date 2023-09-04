<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
    public $table = 'candidates';
    
    protected $fillable = [
        'cand_name',
        'cand_ccod',
        'cand_cname',
        'cand_vote',
    ];
}
