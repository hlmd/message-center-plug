<?php
declare (strict_types=1);

namespace message\service;

use message\enum\Constant;

/**
 * Class WechatXcx
 * @method subscribeMessage(string $to, string $template_code, array $template_array, string $url = '') 订阅消息推送
 * @method unity(string $to, string $template_code, array $template_array, string $url = '') 统一发送->订阅消息推送
 * @package message\service
 */
class WechatXcx extends Send
{
    protected $url_prefix = '/send';
    protected $app_type = Constant::APP_TYPE_WECHAT_XCX;

    protected $unity = 'subscribeMessage';

    /**
     * 订阅消息推送
     * @method subscribeMessage
     * @param string $to 接收者
     * @param string $template_code 模板代码ID
     * @param array $template_param 参数
     * @param string $url 跳转地址
     * @var string[]
     */
    protected $subscribeMessage = [
        'to',
        'template_code',
        'template_param',
        'url' => '',
    ];
}