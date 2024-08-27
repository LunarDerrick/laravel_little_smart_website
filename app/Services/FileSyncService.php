<?php

namespace App\Services;

// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

/**
 * Replacement of symbolic link
 * Space-consuming duplication.
 */
class FileSyncService
{
    public function sync($filePath)
    {
        // Define source and destination paths
        $source = storage_path('app/public/uploads/' . $filePath);
        $destination = public_path('storage/uploads/' . $filePath);

        // Ensure the destination directory exists
        $destinationDir = dirname($destination);
        if (!File::exists($destinationDir)) {
            File::makeDirectory($destinationDir, 0755, true);
        }

        // Copy the file from source to destination
        if (File::exists($source)) {
            File::copy($source, $destination);
        }
    }

    public function delete($filePath)
    {
        // Define destination path
        $destination = public_path('storage/uploads/' . $filePath);

        // Delete the file from public storage
        if (File::exists($destination)) {
            File::delete($destination);
        }
    }
}
