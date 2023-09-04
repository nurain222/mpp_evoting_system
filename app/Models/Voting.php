<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    public $table = 'ballot_box';
    
    protected $fillable = [
        'voter_id',
        'cand_id',
        'otp_code',
    ];

    public function customer(){  
        
        //return the function->('model of orginal table', 'FK in the mix table')
        return $this->belongsTo('App\Models\User', 'voter_id');
    }

    public function themepark(){

        //return $this->belongsTo(Candidates::class);
        return $this->belongsTo('App\Models\Candidates', 'cand_id');
    }
}
