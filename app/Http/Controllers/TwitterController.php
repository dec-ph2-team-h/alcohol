<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Vender\CallTwitterApi;

class TwitterController extends Controller
{
    // 投稿
    public function index()
    {
        $t = new CallTwitterApi();
        $d = $t->searchTweets("チェンソーマン");
        // return view('twitter', ['twitter' => $d]);
        //ddd($d);
        return view('twitter' ,compact('d'));
    }
}