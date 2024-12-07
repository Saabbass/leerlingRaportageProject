<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'subject_name',
        'start',
        'end',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
