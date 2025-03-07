<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Leave extends Model
{
    use HasFactory;
    protected $table = 'leaves';
    protected $fillable = [
        'user_id', 'description', 'start_date', 'days_off', 'status'
    ];


    protected $attributes = [
        'status' => 'pending',
    ];


 

public function user()
{
    return $this->belongsTo(User::class);
}


public function calculateEndDate() {
    return Carbon::parse($this->start_date)->addDays($this->days_off)->format('Y-m-d');
}
    
}
