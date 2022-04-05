<?php

namespace App\Console\Commands;

use App\Mail\PostCreated;
use App\Post;
use App\Subscribe;
use App\Subscription;
use App\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailToSubsscribers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inisev:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail to Subscribers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $websites = Website::all();

        foreach ($websites as $website) {
            $posts = Post::where('website_id', $website->id)->get();
            $subscribers = Subscribe::getSubscriber($website->id);
            foreach ($posts as $post) {
                foreach ($subscribers as $sub) {
                    if (!Subscription::isExist($sub->id, $post->id, $website->id)) {
                        Mail::to($sub)->queue(new \App\Mail\PostCreated($post, $website));

                        Subscription::create([
                            'user_id' => $sub->id,
                            'website_id' => $website->id,
                            'post_id' => $post->id
                        ]);
                    }
                }
            }
        }
    }
}
