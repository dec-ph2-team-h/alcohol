<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterController extends Controller
{
    public function index(Request $request)
    {
        //homeのtimelineから？ツイートを5件取得
        // $result = \Twitter::get('statuses/home_timeline', array("count" => 5));
        $result = \Twitter::get('search/tweets', [
            'q' => 'チェンソーマン',
            'count' => 5,
        ]);
        $d = $result->statuses;
        // ddd($d);


        //ViewのTwitter.blade.phpに渡す
        return view('alcohol.twitter', compact('d'));
    }
}
