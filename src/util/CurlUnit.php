<?php


namespace message\util;


use Exception;

/**
 * Class CurlUnit
 * @package message\util
 * @method setConnectTimeout(int $int) 设置连接超时时间(秒)
 * @method setUrl(string $url) 设置url
 * @method getUrl() 获取url
 */
class CurlUnit
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';


    protected $ch;
    protected $url;
    protected $method;
    protected $https = true;
    protected $query_param = [];
    protected $form_param = [];
    protected $user_agent = '';
    protected $connect_timeout = 30;
    protected $method_array = [self::METHOD_GET, self::METHOD_POST];


    /**
     * 创建Post实例
     * @param string $url
     * @param array $form_param
     * @return CurlUnit
     * @throws Exception
     */
    public static function post(string $url, array $form_param = []): CurlUnit
    {
        $self = new self();
        return $self->init($url, self::METHOD_POST, [], $form_param);
    }

    /**
     * 创建Post实例
     * @param string $url
     * @param array $query_param
     * @return CurlUnit
     * @throws Exception
     */
    public static function get(string $url, array $query_param = []): CurlUnit
    {
        $self = new self();
        return $self->init($url, self::METHOD_GET, $query_param);
    }

    /**
     * 创建 cURL会话
     * @param string $url
     * @param string $method
     * @param array $query_param
     * @param array $form_param
     * @return $this
     * @throws Exception
     */
    public function init(string $url, string $method = self::METHOD_GET, array $query_param = [], array $form_param = []): CurlUnit
    {
        $this->setUrl($url)->setMethod($method)->setQueryParam($query_param)->setFormParam($query_param);
        return $this;
    }

    /**
     * 设置请求方法
     * @param string $method
     * @return $this
     * @throws Exception
     */
    public function setMethod(string $method): CurlUnit
    {
        if (!in_array($method, $this->method_array)) {
            throw new Exception('Request method is not support');
        }
        $this->method = $method;
        return $this;
    }

    /**
     * 设置 query 参数
     * @param array $param
     * @return $this
     */
    public function setQueryParam(array $param): CurlUnit
    {
        $this->query_param = $param;
        return $this;
    }

    /**
     * 设置 form 参数
     * @param array $param
     * @return $this
     */
    public function setFormParam(array $param): CurlUnit
    {
        $this->form_param = $param;
        return $this;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws Exception
     */
    public function __call(string $name, array $arguments)
    {
        $snake_name = StringUnit::snake($name);

        // 设置配置
        if (StringUnit::startsWith($snake_name, 'set_')) {
            $variable = substr($snake_name, 4);
            if(property_exists($this, $variable) && isset($arguments[0])){
                $this->$variable = $arguments[0];
                return $this;
            }else{
                //throw new Exception('property is not ');
            }
        }

        // 获取配置
        if (StringUnit::startsWith($snake_name, 'get_')) {
            $variable = substr($snake_name, 4);
            if(property_exists($this, $variable)){
                return $this->$variable;
            }else{
                //throw new Exception('property is not ');
            }
        }
    }

    public function send()
    {
        /* $httpInfo = array();
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
         if(!empty($this->user_agent)){
             curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
         }
         curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
         if ($https) {
             // 关闭SSL验证
             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
             curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
             curl_setopt($ch, CURLOPT_SSLVERSION, $sslversion);
         }
         if ($ispost) {
             curl_setopt($ch, CURLOPT_URL, $url);
             curl_setopt($ch, CURLOPT_POST, true);
             curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
         } else {
             if ($params) {
                 if (is_array($params)) {
                     $params = http_build_query($params);
                 }
                 curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
             } else {
                 curl_setopt($ch, CURLOPT_URL, $url);
             }
         }

         $response = curl_exec($ch);

         if ($response === FALSE) {
             echo curl_error($ch);
             return false;
         }
         $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
         $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
         curl_close($ch);*/
    }

    /**
     * 关闭 cURL 会话并且释放所有资源。cURL 句柄 ch 也会被删除。
     */
    public function close(): void
    {
        if (gettype($this->ch) === "resource") {
            curl_close($this->ch);
        }
    }
}