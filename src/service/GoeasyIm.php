<?php
declare (strict_types=1);

namespace message\service;

use message\enum\Constant;

/**
 * Class GoeasyIm
 * @method privateMessage(string $from, string $to, array $template_array) 私聊
 * @method groupMessage(string $from, string $to, array $template_array) 群聊
 * @package message\service
 */
class GoeasyIm extends Base
{
    protected $app_type = Constant::APP_TYPE_GOEASY_IM;

    protected $privateMessage = [
        'from',
        'to',
        'template_param',
    ];

    protected $groupMessage = [
        'from',
        'to',
        'template_param',
    ];
}