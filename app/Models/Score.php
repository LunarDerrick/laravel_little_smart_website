<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    // database table
    protected $table = 'scores';

    // If you don't have created_at and updated_at timestamps in your table, disable them:
    public $timestamps = false;

    // database query
    public function fetchScores()
    {
        return User::where('role', 'student')->get();
    }
}
