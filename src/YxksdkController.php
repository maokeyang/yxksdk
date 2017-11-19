<?php

namespace Maokeyang\Yxksdk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YxksdkController extends Controller
{
    //
    public function add($a, $b){
        $result = $a + $b;
        return view('yxksdk::add', compact('result'));

    }

    public function subtract($a, $b){

        echo config('yxk.appid');
        echo $a - $b;
    }
}
