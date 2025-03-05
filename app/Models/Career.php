<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Career extends Model
{
    use Hasfactory;

    protected $table = 'career';
    protected $fillable = ['name'];
}
