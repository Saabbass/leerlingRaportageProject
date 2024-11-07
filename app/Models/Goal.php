<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'goal_name',
        'goal_description', 
        'target_date'
    ];

    protected $casts = [
        'target_date' => 'date'
    ];

    protected $table = 'goals';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
