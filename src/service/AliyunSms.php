<?php


namespace message\service;

class AliyunSms extends Base
{
    protected $app_type = Constant::APP_TYPE_ALIYUN_SMS;

    protected $rule = [
        'to' => 'require|mobile',
        'template_param' => 'array',
        'template_code' => 'require',
        'sign_name' => 'require'
    ];

    protected $message = [
        'to.require' => '手机号码不能为空',
        'to.mobile' => '手机号码格式错误',
        'template_code.require' => '模板代码不能为空',
        'template_param.array' => '模板参数必须是数组',
        'sign_name.require' => '模板参数必须是数组',
    ];

    protected $scene = [
        'sendSms' => ['to', 'template_code', 'template_param', 'sign_name']
    ];
}