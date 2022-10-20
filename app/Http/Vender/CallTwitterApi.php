<?php

namespace App\Http\Vender;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class callTwitterApi
{
    
    private $t;
    
    public function __construct()
    {
        $config = config('twitter');
        $this->t = new TwitterOAuth(
            $config['api_key'],
            $config['secret_key'],
            $config['access_token'],
            $config['access_token_secret'],
        );
        //ddd($this);
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