<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // database table
    protected $table = 'posts';

    // If you don't have created_at and updated_at timestamps in your table, disable them:
    public $timestamps = false;

    // explicitly specify primary key name
    protected $primaryKey = 'postid';

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
