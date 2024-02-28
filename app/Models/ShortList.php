<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShortList extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function appliedJob(){
        return $this->belongsTo(AppliedJob::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function job(){
        return $this->belongsTo(Job::class);
    }
    
    public function company(){
        return $this->belongsTo(User::class);
    }
    
}
