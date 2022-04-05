<?php

namespace App\Mail;

use App\Post;
use App\Website;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $post;

    public $website;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post, Website $website)
    {
        $this->post = $post;
        $this->website = $website;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("New post from website" . $this->website->website_name)->view('emails.post');
    }
}
