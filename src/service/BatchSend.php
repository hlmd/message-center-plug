<?php
declare (strict_types=1);

namespace message\service;

use message\enum\Constant;

/**
 * Class BatchSend
 * @method sendMessage(array $send_list, array $template_array = '') 批量发送
 * @package message\service
 */
class BatchSend extends Base
{
    protected $app_type = Constant::APP_TYPE_BATCH_SEND;

    protected $sendMessage = [
        'send_list',
        'template_param'
    ];
}