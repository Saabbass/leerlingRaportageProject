<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'sent_by'
    ];

    protected $table = 'announcements';
    
    public function sentBy()
    {
        return $this->belongsTo(User::class, 'sent_by');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

