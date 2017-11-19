<?php
/**
 * Created by PhpStorm.
 * User: maokeyang
 * Date: 17-11-19
 * Time: 上午12:00
 */
namespace Maokeyang\Yxksdk;

trait YxksdkMessage
{
    /**
     * 发送消息
     * @param array $param
     * @return mixed
     */
    public function sendMessage(array $param)
    {
        return $this->appId . '-' . json_encode($param) . '-' . $this->appSecret;
    }
}