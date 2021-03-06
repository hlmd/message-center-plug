<?php
require 'vendor/autoload.php';

use message\enum\Constant;
use message\Factory;

const BASE_URL = '************************';
const KEY = '************************';

/**
 * Class AliyunSms
 */
class AliyunSms
{
    /**
     * 单发短信
     * php index.php AliyunSms sms
     * index.php?app=AliyunSms&action=sms
     */
    public function sms()
    {
        $result = Factory::AliyunSms(BASE_URL, KEY)->sms('手机号码', '模板Code',
            [
                'code' => 8888
            ], '签名')
            ->send();
        var_dump($result);
    }

    /**
     * 发送场景短信
     * php index.php AliyunSms scene
     * index.php?app=AliyunSms&action=scene
     */
    public function scene()
    {
        $result = Factory::AliyunSms(BASE_URL, KEY)->scene('手机号码', '场景',
            [
                'code' => 8888
            ])
            ->send();
        var_dump($result);
    }

    /**
     * 发送模板短信
     * php index.php AliyunSms template
     * index.php?app=AliyunSms&action=template
     */
    public function template()
    {
        $result = Factory::AliyunSms(BASE_URL, KEY)->template('************************', '************************',
            [
                'code' => 1116
            ])
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
     * php index.php WechatGzh templateMessage
     * index.php?app=WechatGzh&action=templateMessage
     */
    public function templateMessage()
    {
        $result = Factory::WechatGzh(BASE_URL, KEY)->templateMessage('************************', '************************',
            [
                "key" => ["value" => "************************", "color" => "#888888"],
            ], '************************')->send();
        var_dump($result);
    }

    /**
     * 推送模板消息
     * php index.php WechatGzh unity
     * index.php?app=WechatGzh&action=unity
     */
    public function unity()
    {
        $result = Factory::WechatGzh(BASE_URL, KEY)->unity('************************', '************************',
            [
                "key" => ["value" => "************************", "color" => "#888888"],
            ], 'https://baidu.com/')->send();
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
     * php index.php WechatXcx subscribeMessage
     * index.php?app=WechatXcx&action=subscribeMessage
     */
    public function subscribeMessage()
    {
        $result = Factory::WechatXcx(BASE_URL, KEY)->subscribeMessage('************************', '************************',
            [
                "key" => ["value" => "************************"],
            ])->send();
        var_dump($result);
    }

    /**
     * 统一发送 -> 推送订阅消息
     * php index.php WechatXcx unity
     * index.php?app=WechatXcx&action=unity
     */
    public function unity()
    {
        $result = Factory::WechatXcx(BASE_URL, KEY)->unity('************************', '************************',
            [
                "key" => ["value" => "************************"],
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
        $result = Factory::GoeasyIm(BASE_URL, KEY)->privateMessage('************************', '************************', [
            "key" => "************************",
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
        $result = Factory::GoeasyIm(BASE_URL, KEY)->groupMessage('************************', '************************', [
            "************************" => "************************",
        ])->send();
        var_dump($result);
    }

    /**
     * 统一发送 -> 群聊
     * php index.php GoeasyIm unity
     * index.php?app=GoeasyIm&action=unity
     */
    public function unity()
    {
        $result = Factory::GoeasyIm(BASE_URL, KEY)->unity('************************', '************************', [
            "************************" => "************************",
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
     * php index.php BatchSend message
     * index.php?app=BatchSend&action=message
     */
    public function message()
    {

        $result = Factory::BatchSend(BASE_URL, KEY)
            ->message([
                Factory::GoeasyIm(BASE_URL, KEY)->unity('************************', '************************', ["key" => "************************"])->batch(),
                Factory::GoeasyIm(BASE_URL, KEY)->privateMessage('************************', '************************', ["key" => "************************"])->batch(),
            ])->send();
        var_dump($result);
    }
}

/**
 * Class Message
 */
class Message
{
    /**
     * php index.php Message list
     * index.php?app=Message&action=list
     */
    public function list()
    {
        $result = Factory::Message(BASE_URL, KEY)->where([
            'create_time' => ['************************'],
            'is_read' => 1
        ])->list(1, 1);
        var_dump($result);
    }

    /**
     * php index.php Message read
     * index.php?app=Message&action=read
     */
    public function read()
    {
        $result = Factory::Message(BASE_URL, KEY)->read(8888);
        var_dump($result);
    }
}

/**
 * Class Template
 */
class Template
{

    /**
     * php index.php Template list
     * index.php?app=Template&action=list
     */
    public function list()
    {
        $res = Factory::Template(BASE_URL, KEY)->where(['scene' => '场景名称'])->list(1, 10);
        var_dump($res);
    }

    /**
     * php index.php Template save
     * index.php?app=Template&action=save
     */
    public function save()
    {
        $res = Factory::Template(BASE_URL, KEY)->save([]);
        var_dump($res);
    }

    /**
     * php index.php Template delete
     * index.php?app=Template&action=delete
     */
    public function delete()
    {
        $res = Factory::Template(BASE_URL, KEY)->delete(1);
        var_dump($res);
    }

    /**
     * 返回阿里云短信模板类
     */
    public function AliyunSms()
    {

    }

}

class TemplateAliyunSms
{
    /**
     * 查询短信模板的审核状态
     * php index.php TemplateAliyunSms QuerySmsTemplate
     * index.php?app=TemplateAliyunSms&action=QuerySmsTemplate
     */
    public function QuerySmsTemplate()
    {
        $res = Factory::TemplateAliyunSms()->QuerySmsTemplate('模板Code');
        var_dump($res);
    }

    /**
     * 删除短信模板
     * php index.php TemplateAliyunSms DeleteSmsTemplate
     * index.php?app=TemplateAliyunSms&action=DeleteSmsTemplate
     */
    public function DeleteSmsTemplate()
    {
        $res = Factory::TemplateAliyunSms()->DeleteSmsTemplate('模板Code');
        var_dump($res);
    }

    /**
     * 申请短信模板
     * php index.php TemplateAliyunSms AddSmsTemplate
     * index.php?app=TemplateAliyunSms&action=AddSmsTemplate
     */
    public function AddSmsTemplate()
    {
        $res = Factory::TemplateAliyunSms()->AddSmsTemplate(
            '模板名称',
            Constant::ALIYUN_SMS_TEMPLATE_TYPE_CODE,
            '模板内容',
            '备注');
        var_dump($res);
    }

    /**
     * 修改未通过审核的短信模板
     * php index.php TemplateAliyunSms ModifySmsTemplate
     * index.php?app=TemplateAliyunSms&action=ModifySmsTemplate
     */
    public function ModifySmsTemplate()
    {
        $res = Factory::TemplateAliyunSms()->ModifySmsTemplate(
            '模板Code',
            '模板名称',
            Constant::ALIYUN_SMS_TEMPLATE_TYPE_CODE,
            '模板内容',
            '备注');
        var_dump($res);
    }
}


$app = $argv[1] ?? $_GET['app'];
$action = $argv[2] ?? $_GET['action'];

$aliyun_sms = new $app();
$aliyun_sms->$action();