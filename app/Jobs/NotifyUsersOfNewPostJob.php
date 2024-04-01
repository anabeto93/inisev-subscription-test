<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class NotifyUsersOfNewPostJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Post $post)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $post = $this->post;

        $post->subscribers()->chunk(200, function ($subscribers) use ($post) {
            foreach ($subscribers as $subscriber) {
                $alreadyNotified = DB::table('post_user_notification')->where([
                    'post_id' => $post->id,
                    'user_id' => $subscriber->id,
                ])->exists();
    
                if ($alreadyNotified) {
                    continue;
                }

                SendPostNotificationJob::dispatch($post, $subscriber);

                DB::table('post_user_notification')->insert([
                    'post_id' => $post->id,
                    'user_id' => $subscriber->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }
}
