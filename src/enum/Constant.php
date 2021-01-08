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
    const APP_TYPE_MESSAGE     = 'message';                                        # 消息数据

    # App Type Id
    const APP_TYPE_ID_ALIYUN_SMS  = 1;                                             # 阿里云短信
    const APP_TYPE_ID_WECHAT_XCX  = 2;                                             # 微信小程序
    const APP_TYPE_ID_WECHAT_GZH  = 3;                                             # 微信公众号
    const APP_TYPE_ID_GOEASY_IM   = 4;                                             # GoeasyIm

    const PLATFORM_KEY = 'platform_key';                                           # 请求密匙

    # MessageFrom
    const MESSAGE_FROM_SYSTEM = 'system';                                          # 系统

    # 发送状态
    const SEND_STATUS_NOT_YET = 0;                                                 # 未发送
    const SEND_STATUS_SUCCESS = 1;                                                 # 发送成功
    const SEND_STATUS_ERROR = 2;                                                   # 发送失败

    # 消息是否已读
    const MESSAGE_UNREAD = 0;                                                      # 未读
    const MESSAGE_READ = 1;                                                        # 已读

    # 列表排序code
    const ORDER_CODE_TIME_DESC = 1;                                                # 时间排倒序
    const ORDER_CODE_TIME_ASC = 2;                                                 # 时间排顺序
}