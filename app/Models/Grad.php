<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grad extends Model
{
    use HasFactory;
    protected $table = 'grad';
    protected $fillable = [
        'name',
        'graduation_date',
        'company_name',
      
    ];

    // Define relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}


