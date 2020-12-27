<?php
require 'vendor/autoload.php';

use message\Factory;

class AliyunSms
{
    public function sendSms(){
        Factory::AliyunSms('http://api.message.hlmd.net/api', '7fc7940b4f7f58b49c71bf9e237b633e')->sendSms('13786537522');
    }
}

$aliyun_sms = new AliyunSms();
$action = $argv[1];
$aliyun_sms->$action();