<?php

namespace App\Services;

/**
 * Convert incoming video urls to embed format.
 * eg. YouTube 'watch?' is incompatible with <iframe>, and must convert to '/embed'.
 */
class VideoConversionService
{
    public function convertVideoToEmbed($url)
    {
        // Handle YouTube URLs
        $youtubePatterns = [
            '/youtu\.be\/([a-zA-Z0-9_-]+)/',            // Shortened URL
            '/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/' // Standard watch URL
        ];

        foreach ($youtubePatterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return 'https://www.youtube.com/embed/' . $matches[1];
            }
        }
        // $matches[1] captured the video ID
        // eg. https://youtu.be/dQw4w9WgXcQ
        // $matches[1] = dQw4w9WgXcQ

        // Handle Google Drive URLs
        if (preg_match('/drive\.google\.com\/file\/d\/([a-zA-Z0-9_-]+)\/view/', $url, $matches)) {
            return 'https://drive.google.com/file/d/' . $matches[1] . '/preview';
        }

        // Fallback or unknown source
        // Return the original URL or handle as needed
        return $url;
    }
}
