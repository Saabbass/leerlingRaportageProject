<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'title',
        'content',
        'user_ids',
        'sent_by',
    ];
    
    protected $casts = [
        'user_ids' => 'array',  // Automatically cast the user_ids to an array
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
    public function users()
{
    return $this->belongsToMany(User::class, 'announcement_user');
}
}

