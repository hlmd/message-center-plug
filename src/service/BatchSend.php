<?php
declare (strict_types=1);

namespace message\service;
use message\enum\Constant;

/**
 * Class BatchSend
 * @method message(array $send_list, array $template_array = []) 批量发送
 * @method unity(array $send_list, array $template_array = []) 统一发送 -> 批量发送
 * @package message\service
 */
class BatchSend extends Base
{
    protected $url_prefix = '/send';
    protected $app_type = Constant::APP_TYPE_BATCH_SEND;

    protected $unity = 'message';

    protected $message = [
        'send_list',
        'template_param' => []
    ];
}