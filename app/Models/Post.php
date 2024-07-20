<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // database table
    protected $table = 'posts';

    // table fields
    protected $fillable = ['title', 'description', 'image', 'userid', 'createdtime'];

    // setup datetime for Laravel conversion automation
    protected $casts = [
        'createdtime' => 'datetime',
    ];

    // define one-to-many relationship
    //        user   posts
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
}
