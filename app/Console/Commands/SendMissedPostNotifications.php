<?php

namespace App\Console\Commands;

use App\Jobs\NotifyUsersOfNewPostJob;
use App\Models\Website;
use Illuminate\Console\Command;

class SendMissedPostNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:send-missed-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends missed post notifications to users.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting to send missed post notifications...');
        
        Website::chunk(100, function ($websites) {
            foreach ($websites as $site) {
                $site->posts()->each(function ($post) {
                    // Dispatch job to send notification to subscribers
                    NotifyUsersOfNewPostJob::dispatch($post);
                });
            }
        });

        $this->info('All missed post notifications have been processed.');
    }
}
