<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyContact extends Model
{
    use HasFactory;
    protected $guarded = [];
    function company(){
        return $this->belongsTo(Company::class);
    }
}
