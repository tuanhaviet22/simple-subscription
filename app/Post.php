<?php

namespace App;

use App\Events\PostCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{

    use Notifiable;

    protected $dispatchesEvents = [
        'created' => PostCreated::class
    ];

    protected $table = "posts";

    protected $guarded = [];
}
