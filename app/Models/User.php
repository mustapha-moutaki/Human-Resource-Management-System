<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;

///////////////////////////////////
// use Spatie\Permission\Models\HasRole;

class User extends Authenticatable{
    // use HasRole;
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    // protected $fillable = [
    //     'first_name','last_name', 'email', 'password', 'departement_id', 'role_id', 
    //      'contract_id', 'salary', 'grad_id', 'contract_id'
    // ];
    protected $fillable = [
      'first_name',
        'last_name',
        'email',
        'password',
        'birthday',
        'address',
        'phone',
        'status',
        'assurance',
        'CIN',
        'CNSS',
        'departement_id',
        'role_id',
        'grad_id',
        'contract_id',
        'salary',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

 
    public function departement() {
        return $this->belongsTo(Departement::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }


    public function contract() {
        return $this->belongsTo(Contract::class);
    }

    public function grad()
    {
        return $this->hasMany(Grad::class, 'user_id');
    }

    public function formations()
    {
        return $this->belongsToMany(Formation::class);
    }
// calcul holidays for employee
    public function leaves() {
        return $this->hasMany(Leave::class);
    }


    public function leaveBalance() {
        $yearsWorked = Carbon::parse($this->created_date)->diffInYears(Carbon::now());
        $baseLeave = 18;
        $additionalLeave = $yearsWorked * 0.5;

        return $baseLeave + $additionalLeave;
        //this function check how many years the user worked and then trnasofrm to total days can take as time off and return the number
    }



}
