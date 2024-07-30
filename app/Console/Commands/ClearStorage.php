<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ClearStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:clear';
    // cmd line: php artisan storage:clear

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the entire local contents in /storage/app/public.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $directories = [
            // add new folders here
            'uploads',
        ];

        foreach ($directories as $directory) {
            $path = storage_path("app/public/{$directory}");

            if (File::exists($path)) {
                File::cleanDirectory($path);
                $this->info("Cleared: $directory");
            } else {
                $this->info("Directory does not exist: $path");
            }
        }

        return 0;
    }
}
