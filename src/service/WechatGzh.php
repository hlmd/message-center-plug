<?php
declare (strict_types=1);

namespace message\service;

use message\enum\Constant;

/**
 * Class WechatGzh
 * @method sendTemplateMessage(string $to, string $template_code, array $template_array, string $url = '') 模板推送
 * @return Base
 * @package message\service
 */
class WechatGzh extends Base
{
    protected $app_type = Constant::APP_TYPE_WECHAT_GZH;

    protected $sendTemplateMessage = [
        'to',
        'template_code',
        'template_param',
        'url' => 'https://www.baidu.com/'
    ];
}