<?php
declare (strict_types=1);

namespace message\service;

use message\enum\Constant;

/**
 * Class GoeasyIm
 * @package message\service
 * @method privateMessage(string $to, string $from, array $template_array) 私聊
 * @method groupMessage(string $to, string $from, array $template_array) 群聊
 * @method unity(string $to, string $from, array $template_array) 统一发送->群聊
 */
class GoeasyIm extends Send
{
    protected $url_prefix = '/send';
    protected $app_type = Constant::APP_TYPE_GOEASY_IM;

    /**
     * 统一发送消息 群聊
     * @var string
     */
    protected $unity = 'groupMessage';

    /**
     * 私聊
     * @method privateMessage
     * @param string $to 接收者
     * @param string $from 发送者
     * @param array $template_param 参数
     * @var string[]
     */
    protected $privateMessage = [
        'to',
        'from',
        'template_param',
    ];

    /**
     * 群聊
     * @method groupMessage
     * @param string $to 接收者
     * @param string $from 发送者
     * @param array $template_param 参数
     * @var string[]
     */
    protected $groupMessage = [
        'to',
        'from',
        'template_param',
    ];
}