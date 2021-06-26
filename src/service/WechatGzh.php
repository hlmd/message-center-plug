<?php
declare (strict_types=1);

namespace message\service;

use message\enum\Constant;

/**
 * Class WechatGzh
 * @method templateMessage(string $to, string $template_code, array $template_array, string $url = '') 模板推送
 * @method sceneMessage(string $to, string $scene, array $template_array, string $url = '') 场景模板推送
 * @method unity(string $to, string $template_code, array $template_array, string $url = '') 统一发送->模板推送
 * @return Base
 * @package message\service
 */
class WechatGzh extends Send
{
    protected $url_prefix = '/send';
    protected $app_type = Constant::APP_TYPE_WECHAT_GZH;

    protected $unity = 'templateMessage';

    /**
     * 模板推送
     * @method templateMessage
     * @param string $to 接收者
     * @param string $template_code 模板代码ID
     * @param array $template_param 参数
     * @param string $url 跳转地址
     * @var string[]
     */
    protected $templateMessage = [
        'to',
        'template_code',
        'template_param',
        'url' => ''
    ];

    /**
     * 场景模板推送
     * @method sceneMessage
     * @param string $to 接收者
     * @param string $template_code 模板代码ID
     * @param array $template_param 参数
     * @param string $url 跳转地址
     * @var string[]
     */
    protected $sceneMessage = [
        'to',
        'scene',
        'template_param',
        'url' => ''
    ];
}