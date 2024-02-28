<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppliedJob extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','job_id','company_id'];
    public function job(){
        return $this->belongsTo(Job::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function salary(){
        return $this->belongsTo(CandidateSalary::class);
    }
    public function company(){
        return $this->belongsTo(User::class);
    }
    function is_short_list(){
        return $this->belongsTo(ShortList::class,'job_id','job_id');
    }
}
