<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterController extends Controller
{
    public function index()
    {
        //homeのtimelineから？ツイートを5件取得
        // $result = \Twitter::get('statuses/home_timeline', array("count" => 5));
        $result = \Twitter::get('search/tweets', [
            'q' => '飲み会',
            'count' => 5,
        ]);
        // ddd($result);
        $d = $result->statuses;
        // ddd($d);

        return $d;
        //ViewのTwitter.blade.phpに渡す
        //return view('alcohol.twitter', compact('d'));
    }
}
//=======としきのやつ
//use App\Http\Vender\CallTwitterApi;

//class TwitterController extends Controller
//{
//    // 投稿
//    public function index()
//    {
//        $t = new CallTwitterApi();
//        $d = $t->searchTweets("チェンソーマン");
//        // return view('twitter', ['twitter' => $d]);
//        //ddd($d);
//        return view('twitter' ,compact('d'));
//    }
//}
