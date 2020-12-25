<?php
require 'vendor/autoload.php';

use message\Factory;
use message\util\CurlUnit;

class AliyunSms
{
    public function sendSms(){

        CurlUnit::get('http://api.message.hlmd.net/send/AliyunSms/sendSms?admin=10&badmin=1000')->setConnectTimeout(11);
        var_dump(CurlUnit::get('')->fawfa);
        Factory::make();
    }
}

$aliyun_sms = new AliyunSms();
$action = $argv[1];
$aliyun_sms->$action();