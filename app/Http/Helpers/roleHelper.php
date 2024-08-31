<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class roleHelper
{
    // ambiguous function name to obscure in blade view
    // check whether user has 'teacher' role
    public static function roleCheck()
    {
        $user = Auth::user();
        return $user && $user->role === 'teacher';
    }
}
