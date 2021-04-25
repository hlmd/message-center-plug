<?php
declare (strict_types=1);

namespace message\service;

use message\enum\Constant;

/**
 * Class AliyunSms
 * @method sms(string $to, string $template_code, array $template_array, string $sign_name) 单发短信
 * @method scene(string $to, string $scene, array $template_array = []) 单发场景短信
 * @method template(string $to, string $template_code, array $template_array = []) 单发模板短信
 * @method unity(string $to, string $template_code, array $template_array = []) 统一发送->单发模板短信
 * @package message\service
 */
class AliyunSms extends Base
{
    protected $url_prefix = '/send';
    protected $app_type = Constant::APP_TYPE_ALIYUN_SMS;

    protected $unity = 'template';

    /**
     * 单发短信
     * @method sms
     * @param string $to 接收者
     * @param string $template_code 发送者
     * @param array $template_param 参数
     * @param string $sign_name 签名
     * @var string[]
     */
    protected $sms = [
        'to',
        'template_code',
        'template_param',
        'sign_name'
    ];

    /**
     * 单发场景短信
     * @method scene
     * @param string $to 接收者
     * @param string $scene 场景值
     * @param array $template_param 参数
     * @var string[]
     */
    protected $scene = [
        'to',
        'scene',
        'template_param' => [],
    ];

    /**
     * 单发模板短信
     * @method template
     * @param string $to 接收者
     * @param string $scene 场景值
     * @param array $template_param 参数
     * @var string[]
     */
    protected $template = [
        'to',
        'template_code',
        'template_param' => [],
    ];
}