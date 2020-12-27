<?php
declare (strict_types=1);

namespace message\service;

use message\enum\Constant;

/**
 * Class WechatXcx
 * @method sendSubscribeMessage(string $to, string $template_code, array $template_array) 模板推送
 * @package message\service
 */
class WechatXcx extends Base
{
    protected $app_type = Constant::APP_TYPE_WECHAT_XCX;

    protected $sendSubscribeMessage = [
        'to',
        'template_code',
        'template_param',
    ];
}