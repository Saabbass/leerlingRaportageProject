<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Grades extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'subject_id', 'assignment_name', 'grade', 'date', 'description'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (is_null($model->user_id)) {
                $model->user_id = Auth::user()->id; // Use Auth facade
            }
        });
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}