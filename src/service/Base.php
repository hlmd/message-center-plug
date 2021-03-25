<?php
declare (strict_types=1);

namespace message\service;


use Exception;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use message\unit\Str;
use message\enum\Constant;

/**
 * Class Base
 * @package message\service
 */
class Base
{
    protected $base_url = '';
    protected $url_prefix = '';
    protected $app_type = '';
    protected $key = '';
    protected $method = '';
    protected $data = [];
    protected $app_id = null;

    /**
     * Base constructor.
     * @param $base_url
     * @param $key
     */
    public function __construct($base_url, $key)
    {
        $this->base_url = $base_url;
        $this->key = $key;
    }

    /**
     * 调用方法生成示例
     * @param string $method
     * @param array $args
     * @return $this
     * @throws Exception
     */
    public function __call(string $method, array $args): Base
    {
        if (!property_exists($this, $method) || property_exists(Base::class, $method)) {
            throw new Exception($method . '()方法不存在');
        }
        if (is_string($this->$method)) {
            if (!property_exists($this, $this->$method)) {
                throw new Exception($method . '()方法不存在');
            }
            return call_user_func_array([$this, $this->$method], $args);
        }
        $data = [];
        $i = 0;
        foreach ($this->$method as $key => $value) {
            if (is_int($key) && !isset($args[$i])) {
                throw new Exception('缺少参数: ' . $value);
            } else if (is_string($key)) {
                if (!isset($args[$i])) {
                    $data[$key] = $value;
                } else {
                    $data[$key] = $args[$i];
                }
            } else {
                $data[$value] = $args[$i];
            }
            $i++;
        }
        $this->data = $data;
        $this->method = $method;
        return $this;
    }

    /**
     * 设置app_id
     * @param $app_id
     * @return $this
     */
    public function setAppId($app_id): Base
    {
        $this->app_id = $app_id;
        return $this;
    }

    /**
     * 设置层级
     * @param $level
     * @return $this
     */
    public function setLevel($level): Base
    {
        $this->data['level'] = $level;
        return $this;
    }

    /**
     * 生成批量发送数据
     * @return array
     */
    public function batch(): array
    {
        return [
            'service' => $this->app_type,
            'action' => $this->method,
            'data' => $this->data,
        ];
    }

    /**
     * 发送消息
     * @return mixed
     * @throws GuzzleException
     * @throws Exception
     */
    public function send()
    {
        if (empty($this->method)) {
            throw new Exception('请选择方法');
        }
        $http_client = new HttpClient();
        $query = [Constant::PLATFORM_KEY => $this->key];
        if (isset($this->app_id)) $query['app_id'] = $this->app_id;
        $response = $http_client->post($this->base_url . $this->url_prefix . '/' . Str::studly($this->app_type) . '/' . $this->method, [
            'query' => $query,
            'json' => $this->data
        ])->getBody()->getContents();
        return json_decode($response, true);
    }
}