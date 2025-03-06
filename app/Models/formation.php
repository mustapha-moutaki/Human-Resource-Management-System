<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Formation extends Model
{
    use HasFactory;
    protected $table ='formation';
    protected $fillable = ['title','completion_date','type', 'description', 'start_date', 'duration'];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
