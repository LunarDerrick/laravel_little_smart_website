<?php

namespace App\Http\Helpers;

use ParsedownExtra;
// use App\Http\Helpers\CustomParsedown;

class MarkdownHelper
{
    public static function render($text)
    {
        // original
        $parsedown = new ParsedownExtra();
        // $parsedown = new CustomParsedown();
        return $parsedown->text($text);
    }
}
