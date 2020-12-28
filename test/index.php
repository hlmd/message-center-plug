<?php
require 'vendor/autoload.php';

use message\Factory;

const BASE_URL = 'http://***.***/***/**';
const KEY = '*********************************';

/**
 * Class AliyunSms
 */
class AliyunSms
{
    /**
     * 单发短信
     * php index.php AliyunSms sendSms
     * index.php?app=AliyunSms&action=sendSms
     */
    public function sendSms()
    {
        $result = Factory::AliyunSms(BASE_URL, KEY)
            ->sendSms('***********', '***********', ['code' => '******'], '******')
            ->send();
        var_dump($result);
    }
}

/**
 * Class WechatGzh
 */
class WechatGzh
{
    /**
     * 推送模板消息
     * php index.php WechatGzh sendTemplateMessage
     * index.php?app=WechatGzh&action=sendTemplateMessage
     */
    public function sendTemplateMessage()
    {
        $result = Factory::WechatGzh(BASE_URL, KEY)
            ->sendTemplateMessage('**********************', '*********************************', [
                "key1" => ["value" => "***********", "color" => "#000000"],
                "key2" => ["value" => "***********", "color" => "#000000"],
                "key3" => ["value" => "***********", "color" => "#000000"],
            ])->send();
        var_dump($result);
    }
}

/**
 * Class WechatXcx
 */
class WechatXcx
{
    /**
     * 推送订阅消息
     * php index.php WechatXcx sendSubscribeMessage
     * index.php?app=WechatXcx&action=sendSubscribeMessage
     */
    public function sendSubscribeMessage()
    {
        $result = Factory::WechatXcx(BASE_URL, KEY)
            ->sendSubscribeMessage('**********************', '*********************************', [
                "thing1" => ["value" => "***********"],
                "thing2" => ["value" => "***********"],
                "thing3" => ["value" => "***********"],
            ])->send();
        var_dump($result);
    }
}

/**
 * Class GoeasyIm
 */
class GoeasyIm
{
    /**
     * 单聊
     * php index.php GoeasyIm privateMessage
     * index.php?app=GoeasyIm&action=privateMessage
     */
    public function privateMessage()
    {
        $result = Factory::GoeasyIm(BASE_URL, KEY)
            ->privateMessage('***********', '***********', [
                "title" => "***********",
                "author" => "***********",
                "describe" => "***********",
                "content" => "***********",
            ])->send();
        var_dump($result);
    }

    /**
     * 群聊
     * php index.php GoeasyIm groupMessage
     * index.php?app=GoeasyIm&action=groupMessage
     */
    public function groupMessage()
    {
        $result = Factory::GoeasyIm(BASE_URL, KEY)
            ->groupMessage('***********', '***********', [
                "title" => "***********",
                "author" => "***********",
                "describe" => "***********",
                "content" => "***********",
            ])->send();
        var_dump($result);
    }
}


/**
 * Class BatchSend
 */
class BatchSend
{
    /**
     * php index.php BatchSend sendMessage
     * index.php?app=BatchSend&action=sendMessage
     */
    public function sendMessage()
    {
        $result = Factory::BatchSend(BASE_URL, KEY)
            ->sendMessage([
                Factory::AliyunSms(BASE_URL, KEY)->sendSms('***********', '***********', [], '***********')->batch(),
                Factory::AliyunSms(BASE_URL, KEY)->sendSms('***********', '***********', [], '***********')->batch(),
            ], [
                "code" => '******'
            ])->send();
        var_dump($result);
    }
}


$app = $argv[1] ?? $_GET['app'];
$action = $argv[2] ?? $_GET['action'];

$aliyun_sms = new $app();
$aliyun_sms->$action();