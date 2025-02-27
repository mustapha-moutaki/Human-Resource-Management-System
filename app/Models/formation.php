<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class formation extends Model
{
    use HasFactory;
    protected $table ='formation';
    protected $fillable = ['title','skill','completion_date','type'];
}
