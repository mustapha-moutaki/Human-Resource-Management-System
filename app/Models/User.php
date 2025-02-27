<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password', 'departement_id', 'role_id', 
        'grad_id', 'contract_id', 'salary', 'employee_id'
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

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function grad() {
        return $this->belongsTo(Grad::class);
    }

    public function contract() {
        return $this->belongsTo(Contract::class);
    }
}
