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
        'app_type' => 'string',
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
        'id' => 'int|array',
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
     * @param false $extend
     * @return $this
     */
    public function where($where, $extend = false): Template
    {
        $extend == false && $where = array_intersect_key($where, $this->where);
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
     * 设置分页
     * @param int $page
     * @param int $size
     * @return $this
     */
    public function setPageSize(int $page, int $size): Template
    {
        $this->data['page'] = $page;
        $this->data['size'] = $size;
        return $this;
    }

    /**
     * 获取列表
     * @return mixed
     * @throws GuzzleException
     */
    public function list()
    {

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
     * 设置APP类型
     * @param $type
     * @return $this
     */
    public function setAppType($type): Template
    {
        $this->data['app_type'] = $type;
        return $this;
    }

    /**
     * 模板详情
     * @param $id
     * @param string[]|string $type
     * @return mixed
     * @throws GuzzleException
     */
    public function detail($id)
    {
        $this->data['id'] = $id;
        $this->method = __FUNCTION__;
        return $this->send();
    }


    /**
     * 删除模板
     * @param $id
     * @param string[]|string $type
     * @return mixed
     * @throws GuzzleException
     */
    public function delete($id)
    {
        $this->data['id'] = $id;
        $this->method = __FUNCTION__;
        return $this->send();
    }
}