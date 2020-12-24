<?php
require 'vendor/autoload.php';

class AliyunSms
{

}

$aliyun_sms = new AliyunSms();
$action = $_GET['action'];
$aliyun_sms->$action();