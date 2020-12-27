<?php
declare (strict_types=1);

namespace message\service;

use message\enum\Constant;

/**
 * Class AliyunSms
 * @method sendSms(string $to, string $template_code, array $template_array, string $sign_name) 单发短信
 * @package message\service
 */
class AliyunSms extends Base
{
    protected $app_type = Constant::APP_TYPE_ALIYUN_SMS;

    protected $sendSms = [
        'to',
        'template_code',
        'template_param',
        'sign_name'
    ];
}