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

    // explicitly specify primary key name
    protected $primaryKey = 'scoreid';

    protected $fillable = [
        'userid',
        'mandarin',
        'english',
        'malay',
        'math',
        'science',
        'history',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
}
