<?php


namespace message\service;

use GuzzleHttp\Exception\GuzzleException;
use message\enum\Constant;

/**
 * Class Message
 * @package message\service
 */
class Message extends Base
{
    protected $app_type = Constant::APP_TYPE_MESSAGE;

    protected $list = [
        'page',
        'size'
    ];

    protected $read = [
        'id',
        'type' => []
    ];

    protected $where = [
        'type' => 'type',
        'to' => 'string|array',
        'url' => 'string',
        'from' => 'string|array',
        'from_to' => 'array',
        'from_or_to' => 'array',
        'action' => 'string',
        'template_code' => 'string',
        'template_param' => 'array',
        'level' => 'int|array',
        'order' => 'int|array',
        'reader' => 'string',
        'read_type' => 'int',
        'send_status' => 'int',
        'create_time' => 'time',
        'update_time' => 'time',
    ];

    private $fromLog = [
        'from',
        'date'
    ];

    /**
     * 查询条件
     * @param $where
     * @param $extend
     * @return $this
     */
    public function where($where, $extend = false): Message
    {
        $extend == false && $where = array_intersect_key($where, $this->where);
        $this->data = array_merge($this->data, $where);
        return $this;
    }

    /**
     * 获取列表
     * @param int $page
     * @param int $size
     * @return mixed
     * @throws GuzzleException
     */
    public function list(int $page, int $size)
    {
        $this->data['page'] = $page;
        $this->data['size'] = $size;
        $this->method = __FUNCTION__;
        return $this->send();
    }

    /**
     * 已读消息
     * @param $id
     * @param string[]|string $type
     * @return mixed
     * @throws GuzzleException
     */
    public function read($id, $type = null)
    {
        $this->data['id'] = $id;
        $this->data['type'] = $type;
        $this->method = __FUNCTION__;
        return $this->send();
    }

    /**
     * 发送者日志
     * @param $from
     * @param $date
     * @return mixed
     * @throws GuzzleException
     */
    public function fromLog($from, $date)
    {
        $this->data['from'] = $from;
        $this->data['date'] = $date;
        $this->method = __FUNCTION__;
        return $this->send();
    }

}