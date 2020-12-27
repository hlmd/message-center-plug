<?php


namespace message;


use \Exception;
use message\enum\Constant;
use message\service\Base;


/**
 * @method static AliyunSms(string $base_url, string $key) 阿里云短信
 */
class Factory
{

    /**
     * @param $name
     * @param $arguments
     * @return Base
     * @throws Exception
     */
    public static function __callStatic($name, $arguments): Base
    {
        // TODO: Implement __callStatic() method.
        $service = 'message\\service\\' . $name;
        $config = self::getConfig($arguments);
        return new $service(...$config);
    }

    /**
     * 获取配置
     * @param $config
     * @return array
     * @throws Exception
     */
    public static function getConfig($config): array
    {
        if ($config) return $config;
        if (function_exists('env')) {
            $path = env('app_path') . '/../extend';
        } else {
            $path = __DIR__ . '/../../../../../extend';
        }
        $file_path = $path . '/message.php';
        if (is_dir($path) && is_file($file_path)) {
            $config = require $file_path;
            if (!isset($config['base_url']) || !isset($config['key'])) {
                throw new Exception('缺少配置!');
            }
            return [
                $config['base_url'],
                $config['key']
            ];
        } else {
            throw new Exception('缺少配置!');
        }
    }
}