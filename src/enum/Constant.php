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
    const APP_TYPE_TEMPLATE    = 'template';                                       # 消息模板

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

    # Read Type
    const READ_TYPE_ALL = 0;                                                       # All
    const READ_TYPE_READ = 1;                                                      # Read
    const READ_TYPE_UNREAD = 2;                                                    # UnRead

    # 列表排序code
    const ORDER_CODE_TIME_DESC = 1;                                                # 时间降序
    const ORDER_CODE_TIME_ASC = 2;                                                 # 时间升序
    const ORDER_CODE_LEVEL_DESC = 3;                                               # 级别降序
    const ORDER_CODE_LEVEL_ASC = 4;                                                # 级别升序

    # 消息级别
    const MSG_LEVEL_NORMAL = 1;                                                    # 正常
    const MSG_LEVEL_MILD = 2;                                                      # 轻度
    const MSG_LEVEL_REMIND = 3;                                                    # 提醒
    const MSG_LEVEL_IMPORTANT = 4;                                                 # 重要
    const MSG_LEVEL_URGENT = 5;                                                    # 紧急

    # 短信模板审核状态
    const TEMPLATE_AUDIT_INIT = 0;                                                 # 审核中
    const TEMPLATE_AUDIT_PASS = 1;                                                 # 审核通过
    const TEMPLATE_AUDIT_FAIL = 2;                                                 # 审核失败

    # 阿里云短信模板类型
    const ALIYUN_SMS_TEMPLATE_TYPE_CODE = 0;                                       # 表示验证码
    const ALIYUN_SMS_TEMPLATE_TYPE_NOTICE = 1;                                     # 表示短信通知
    const ALIYUN_SMS_TEMPLATE_TYPE_PROMOTE = 2;                                    # 表示推广短信
    const ALIYUN_SMS_TEMPLATE_TYPE_FOREIGN = 3;                                    # 国际/港澳台消息


}