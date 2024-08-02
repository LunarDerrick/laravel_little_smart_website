<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // RosterModel.php remains
    // // If your table name is not 'rosters', you need to specify it:
    // protected $table = 'users';

    // // If your primary key is not auto-incrementing, you need to specify it:
    // public $incrementing = false;

    // // If you don't have created_at and updated_at timestamps in your table, disable them:
    // public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'username',
        'name',
        'role',
        'age',
        'telno',
        'school',
        'standard',
        'email',
        'password',
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

    // RosterModel.php remains
    // // filter database query
    // public function fetchStudents()
    // {
    //     return User::where('role', 'student')->get();
    // }

    public function scopeStudents($query)
    {
        return $query->where('role', 'student');
    }

    public function scopeTeachers($query)
    {
        return $query->where('role', 'teacher');
    }

    public function scores()
    {
        return $this->hasMany(Score::class, 'userid');
    }

    // define one-to-many relationship
    //        user   posts
    public function posts()
    {
        return $this->hasMany(Post::class, 'userid');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
