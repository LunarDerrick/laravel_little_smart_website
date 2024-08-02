<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // database table
    protected $table = 'feedbacks';

    // If you don't have created_at and updated_at timestamps in your table, disable them:
    public $timestamps = false;

    // explicitly specify primary key name
    protected $primaryKey = 'msgid';

    // table fields
    protected $fillable = ['userid', 'title', 'description', 'createdtime'];

    // setup datetime for Laravel conversion automation
    protected $casts = [
        'createdtime' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
