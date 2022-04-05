<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Subscribe;
use App\Subscription;
use App\Website;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendEmailNotification implements ShouldQueue
{

    public $delay = 5;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param PostCreated $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $websiteId = $event->post->website_id;
        $website = Website::find($websiteId);

        $subs = Subscribe::getSubscriber($websiteId);
        Mail::to($subs)
            ->send(new \App\Mail\PostCreated($event->post, $website));

        foreach ($subs as $sub) {
            if (!Subscription::isExist($sub->id, $event->post->id, $websiteId)) {

                Subscription::create([
                    'user_id' => $sub->id,
                    'website_id' => $websiteId,
                    'post_id' => $event->post->id
                ]);
            }
        }
    }

}
