<?php


namespace message\service;

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
        'action' => 'string',
        'template_code' => 'string',
        'template_param' => 'string',
        'order' => 'int|array',
        'reader' => 'string',
        'category' => 'string',
        'remark' => 'string',
        'level' => 'int',
        'send_status' => 'int',
        'create_time' => 'time',
        'update_time' => 'time',
    ];

    /**
     * 查询条件
     * @param $where
     * @return $this
     */
    public function where($where): Message
    {
        $where = array_intersect_key($where, $this->where);
        $this->data = array_merge($this->data, $where);
        return $this;
    }

    /**
     * 获取列表
     * @param int $page
     * @param int $size
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function read($id, $type = null)
    {
        $this->data['id'] = $id;
        $this->data['type'] = $type;
        $this->method = __FUNCTION__;
        return $this->send();
    }

}