<?php


namespace message\enum;


class Constant
{
    # App Type Code
    const APP_TYPE_ALIYUN_SMS  = 'aliyun_sms';                                     # 阿里云短信
    const APP_TYPE_WECHAT_XCX  = 'wechat_xcx';                                     # 微信小程序
    const APP_TYPE_WECHAT_GZH  = 'wechat_gzh';                                     # 微信公众号
    const APP_TYPE_GOEASY_IM   = 'goeasy_im';                                      # GoeasyIm
    const APP_TYPE_BATCH_SEND  = 'batch_send';                                     # 批量发送

    # 放回状态码
    const RETURN_CODE_OK = 1;                                                      # 成功
    const RETURN_CODE_ERROR = 10000;                                               # 失败
    const RETURN_CODE_SERVICE_NOT_FIND = 10001;                                    # 服务不存在
    const RETURN_CODE_PARAM_ERROR = 10002;                                         # 参数异常
    const RETURN_CODE_ACCESS_DISABLE = 10003;                                      # 禁止访问
    const RETURN_CODE_THIRD_ERROR = 10004;                                         # 第三方错误

    const PLATFORM_KEY = 'platform_key';                                           # 请求密匙

    # MessageFrom
    const MESSAGE_FROM_SYSTEM = 'system';                                          # 系统
}