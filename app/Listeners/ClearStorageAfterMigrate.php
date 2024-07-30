<?php

namespace App\Listeners;

// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Console\Events\CommandFinished;
use Illuminate\Support\Facades\Artisan;

class ClearStorageAfterMigrate
{
    // protected $command;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CommandFinished $event): void
    {
        $commandsToWatch = [
            'migrate:reset',
            'migrate:refresh',
            'migrate:fresh',
        ];

        if (in_array($event->command, $commandsToWatch)) {
            Artisan::call('storage:clear');
            // log to terminal to notify action
            echo "Cleared storage/app/public.\n";
        }
    }
}
