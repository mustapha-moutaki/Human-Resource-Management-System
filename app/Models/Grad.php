<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grad extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'graduation_date',
        'company_name',
        'user_id',
    ];

    // Define relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


