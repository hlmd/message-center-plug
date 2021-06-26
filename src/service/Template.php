<?php


namespace message\service;


use GuzzleHttp\Exception\GuzzleException;
use message\enum\Constant;

class Template extends Base
{
    protected $app_type = Constant::APP_TYPE_TEMPLATE;

    protected $list = [
        'page',
        'size'
    ];

    protected $save = [
        'id' => 'int',
        'type' => 'string',
        'code' => 'string',
        'param' => 'string',
        'scene' => 'string',
        'title' => 'string',
        'content' => 'string',
        'example' => 'string',
        'sign_name' => 'string',
    ];

    protected $where = [
        'type' => 'type',
        'code' => 'string',
        'param' => 'string',
        'scene' => 'string',
        'title' => 'string',
        'content' => 'string',
        'example' => 'string',
        'sign_name' => 'string',
        'order' => 'int|array',
    ];


    /**
     * 查询条件
     * @param $where
     * @return $this
     */
    public function where($where): Template
    {
        $where = array_intersect_key($where, $this->where);
        $this->data = array_merge($this->data, $where);
        return $this;
    }

    /**
     * 阿里云短信模板
     * @return TemplateAliyunSms
     */
    public function AliyunSms(): TemplateAliyunSms
    {
        return new TemplateAliyunSms($this->base_url, $this->key);
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
     * 新增/修改
     * @param $data
     * @return mixed
     * @throws GuzzleException
     */
    public function save($data)
    {
        $data = array_intersect_key($data, $this->save);
        $this->data = array_merge($this->data, $data);;
        $this->method = __FUNCTION__;
        return $this->send();
    }

    /**
     * 删除消息
     * @param $id
     * @param string[]|string $type
     * @return mixed
     * @throws GuzzleException
     */
    public function delete($id, $type = null)
    {
        $this->data['id'] = $id;
        $this->data['type'] = $type;
        $this->method = __FUNCTION__;
        return $this->send();
    }
}