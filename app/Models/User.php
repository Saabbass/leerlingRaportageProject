<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function parents()
    {
        return $this->hasMany(UserParentStudent::class, 'student_id', 'id');
    }

    // public function students()
    // {
    //     return $this->hasMany(User::class, 'parent_id'); // This is incorrect
    // }
    public function isParentOf($studentId)
{
    return UserParentStudent::where('parent_id', $this->id)->where('student_id', $studentId)->exists();
}
public function announcements()
{
    return $this->belongsToMany(Announcements::class, 'announcement_user');
}

}
