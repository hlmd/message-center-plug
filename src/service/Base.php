<?php
declare (strict_types=1);

namespace message\service;


use Exception;
use GuzzleHttp\Client as HttpClient;
use message\think\helper\Str;
use message\think\Validate;
use message\enum\Constant;

/**
 * Class Base
 * @method sendSms(string $to, string $template_code, array $template_array, string $sign_name) 阿里云单发短信
 * @package message\service
 */
class Base extends Validate
{
    protected $base_url = '';
    protected $key = '';

    /**
     * Base constructor.
     * @param $base_url
     * @param $key
     */
    public function __construct($base_url, $key)
    {
        $this->base_url = $base_url;
        $this->key = $key;
        parent::__construct();
    }

    /**
     * 调用方法
     * @param string $method
     * @param array $args
     * @return mixed
     * @throws Exception
     */
    public function __call(string $method, array $args)
    {
        var_dump($this->base_url . '/' . Str::studly($this->app_type) . $method);
        if (!$this->hasScene($method)) {
            return parent::__call($method, $args);
        }
        $data = [];
        foreach ($this->scene[$method] as $key => $value) {
            if (!isset($args[$key])) {
                throw new Exception('缺少参数: ' . $value . ',在' . $method . '(' . join(',', $this->scene[$method]) . ')');
            }
            $data[$value] = $args[$key];
        }
        if ($this->check($data) === false) {
            throw new Exception($this->getError());
        }
        $http_client = new HttpClient();
        $http_client->post($this->base_url . '/' . Str::studly($this->app_type) . $method, [
            'query' => [
                Constant::PLATFORM_KEY => $this->key
            ],
            'form_params' => $data
        ]);
    }
}