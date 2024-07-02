<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RosterModel extends Model
{
    use HasFactory;

    // If your table name is not 'rosters', you need to specify it:
    protected $table = 'users';

    // Specify the primary key if it's not 'id':
    // protected $primaryKey = 'your_primary_key';

    // If your primary key is not auto-incrementing, you need to specify it:
    public $incrementing = false;

    // If you don't have created_at and updated_at timestamps in your table, disable them:
    public $timestamps = false;

    // Specify the fillable attributes for mass assignment protection
    // protected $fillable = [
    //     // List your columns here
    //     'column1', 'column2', 'column3'
    // ];

    // filter database query
    public function fetchStudents()
    {
        return User::where('role', 'student')->get();
    }
}
