<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];
 
    public function contact(){
        return $this->hasOne(CompanyContact::class);
    }
    public function job(){
        return $this->hasMany(Job::class);
    }
    public function candidate(){
        return $this->hasMany(Candidate::class);
    }
    public function appliedJob(){
        return $this->hasMany(AppliedJob::class);       
    }
    public function company(){
        return $this->hasMany(Company::class);
    }

    public function salary(){
        return $this->hasMany(CandidateSalary::class);
    }
    
    public function education(){
        return $this->hasMany(CandidateEducationDetails::class);
    }
    public function experience(){
        return $this->hasMany(CandidateExperience::class);
    }
    public function training(){
        return $this->hasMany(CandidateProfessionalTraining::class);
    }
    public function skill(){
        return $this->hasMany(CandidateSkill::class);
        
    }
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
 

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
