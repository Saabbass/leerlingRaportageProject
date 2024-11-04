<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    protected $fillable = [
        'subject_name',
        'subject_description',
    ];

    // public function subject()
    // {
    //     return $this->belongsTo(Subject::class);
    // }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
