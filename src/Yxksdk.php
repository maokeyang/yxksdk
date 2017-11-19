<?php
/**
 * Created by PhpStorm.
 * User: maokeyang
 * Date: 17-11-18
 * Time: 下午11:00
 */

namespace Maokeyang\Yxksdk;


use Illuminate\Support\Facades\Facade;

class Yxksdk extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'yxksdk';
    }
}