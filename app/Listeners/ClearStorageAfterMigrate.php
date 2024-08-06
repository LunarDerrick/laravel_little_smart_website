<?php

namespace App\Listeners;

// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Console\Events\CommandFinished;
use Illuminate\Support\Facades\Artisan;

class ClearStorageAfterMigrate
{
    // list of commands to respond to
    protected $commandsToWatch = [
        'migrate:reset',
        'migrate:refresh',
        'migrate:fresh',
    ];

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * Context: If the user resets database via migrate command, listener will clear local storage as well.
     */
    public function handle(CommandFinished $event): void
    {
        $command = trim($event->command);
        $options = $event->input->getOptions();

        if (in_array($command, $this->commandsToWatch)) {
            // check for '--seed' option
            // if true, skip local storage clear.
            if (!isset($options['seed']) || !$options['seed']) {
                Artisan::call('storage:clear');
                echo "Cleared storage/app/public.\n";
            }
        }
    }
}
