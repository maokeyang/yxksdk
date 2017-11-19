<?php
/**
 * Created by PhpStorm.
 * User: maokeyang
 * Date: 17-11-18
 * Time: 下午11:06
 */

namespace Maokeyang\Yxksdk;

use Illuminate\Support\Facades\Config;

class YxksdkLib
{
    /**
     * @var const
     */
    const YXK_SDK_VERSION = '1.0.0';

    /**
     * @var integer
     */
    public static $connectTimeout = 30;

    /**
     * @var int
     */
    public static $socketTimeout = 10;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var integer
     */
    protected $appId;

    /**
     * @var string
     */
    protected $appSecret;


    use YxksdkMessage;


    public function __construct()
    {
        $this->appId = Config::get('yxksdk.id');
        $this->appSecret = Config::get('yxksdk.secret');
    }

//    /**
//     * 发送消息
//     * @param array $param
//     * @return mixed
//     */
//    public function sendMessage(array $param)
//    {
//        return $this->appId . '-' . json_encode($param) . '-' . $this->appSecret;
//    }


    /**
     * GET方法请求
     *
     * @param $url
     * @return mixed|string
     */
    private function getRequest($url)
    {
        if (function_exists('curl_exec')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::$connectTimeout);
            curl_setopt($ch, CURLOPT_TIMEOUT, self::$socketTimeout);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            $curlErrorNo = curl_errno($ch);
            curl_close($ch);
            if ($curlErrorNo) {
                $err = sprintf("curl[%s] error[%s]", $url, curl_errno($ch) . ':' . curl_error($ch));
                trigger_error($err);
            }
        } else {
            $opts = array(
                'http' => array(
                    'method' => "GET",
                    'timeout' => self::$connectTimeout + self::$socketTimeout,
                )
            );
            $context = stream_context_create($opts);
            $data = @file_get_contents($url, false, $context);
        }
        return $data;
    }
    /**
     * Post方法请求
     *
     * @param string $url
     * @param array $postData
     * @return mixed|string
     */
    private function postRequest($url, $postData = [])
    {
        if (! $postData) {
            return false;
        }
        $data = http_build_query($postData);
        if (function_exists('curl_exec')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::$connectTimeout);
            curl_setopt($ch, CURLOPT_TIMEOUT, self::$socketTimeout);
            //不可能执行到的代码
            if (! $postData) {
                curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            } else {
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }
            $data = curl_exec($ch);
            $curlErrorNo = curl_errno($ch);
            curl_close($ch);
            if ($curlErrorNo) {
                $err = sprintf("curl[%s] error[%s]", $url, curl_errno($ch) . ':' . curl_error($ch));
                trigger_error($err);
            }
        } else {
            if ($postData) {
                $opts = array(
                    'http' => array(
                        'method' => 'POST',
                        'header' => "Content-type: application/x-www-form-urlencoded\r\n" . "Content-Length: " . strlen($data) . "\r\n",
                        'content' => $data,
                        'timeout' => self::$connectTimeout + self::$socketTimeout
                    )
                );
                $context = stream_context_create($opts);
                $data = file_get_contents($url, false, $context);
            }
        }
        return $data;
    }
}