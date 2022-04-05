<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subscription extends Model
{
    protected $table = 'subscription_log';

    protected $guarded = [];

    /**
     * Check email was sent to special user in special website
     *
     * @param $userId
     * @param $postId
     * @param $websiteId
     * @return bool
     */
    public static function isExist($userId, $postId, $websiteId)
    {
        $get = DB::table('subscription_log')->where([
            'user_id' => $userId,
            'post_id' => $postId,
            'website_id' => $websiteId
        ])->first();

        if (empty($get)) {
            return false;
        }

        return true;
    }

}
