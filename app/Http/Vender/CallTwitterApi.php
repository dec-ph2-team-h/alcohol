<?php

namespace App\Http\Vender;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class callTwitterApi
{
    
    private $t;
    
    public function __construct()
    {
        $this->t = new TwitterOAuth(
            env('TWITTER_CLIENT_KEY'),
            env('TWITTER_CLIENT_SECRET'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET'));
    }
    
    // ツイート検索
    public function searchTweets(String $searchWord)
    {
        $d = $this->t->get("search/tweets", [
            'q' => $searchWord,
            'count' => 3,
         ]);
         
        return $d->statuses;
    }
}