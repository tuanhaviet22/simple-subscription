<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Subscribe extends Model
{
    protected $table = 'user_website';

    protected $guarded = [];

    public $timestamps = false;


    /**
     * Get list sub by website ID
     *
     * @param $website
     * @return Collection
     */
    public static function getSubscriber($website)
    {
        return DB::table('user_website')
            ->leftJoin('users', 'users.id', '=', 'user_website.user_id')
            ->select('users.*')->get();
    }

    /**
     * Subscribe action
     *
     * @param $user
     * @param $website
     * @return bool
     */
    public static function doSubsrcibe($user, $website)
    {
        $exist = DB::table('user_website')
            ->where('user_id', $user)
            ->where('website_id', $website)->first();

        if (empty($exist)) {

            Subscribe::create([
                'user_id' => $user,
                'website_id' => $website
            ]);

            return true;
        }

        return false;
    }
}
