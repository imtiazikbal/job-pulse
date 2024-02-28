<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidateExperience extends Model
{
    use HasFactory;
    protected $guarded = [];

    function experience(){
        return $this->belongsTo(Job::class);
    }
}
