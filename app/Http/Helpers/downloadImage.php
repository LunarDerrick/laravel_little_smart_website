<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('downloadImage')) {
    function downloadImage($url, $path)
    {
        // static url handler
        // $contents = file_get_contents($url);

        // dynamic url handler
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
        $contents = curl_exec($ch);
        curl_close($ch);

        Storage::disk('public')->put($path, $contents);
        return $path;
    }
}
