<?php
declare (strict_types=1);

namespace message\service;

use message\enum\Constant;

/**
 * Class AliyunSms
 * @method QuerySmsTemplate($TemplateCode) 查询短信模板的审核状态
 * @method DeleteSmsTemplate($TemplateCode) 删除短信模板
 * @method AddSmsTemplate($TemplateName, $TemplateType, $TemplateContent, $Remark) 申请短信模板
 * @method ModifySmsTemplate($TemplateCode, $TemplateName, $TemplateType, $TemplateContent, $Remark) 修改未通过审核的短信模板
 * @package message\service
 */
class TemplateAliyunSms extends Base
{
    protected $url_prefix = '/template';
    protected $app_type = Constant::APP_TYPE_ALIYUN_SMS;
    protected $send = true;

    /**
     * 查询短信模板的审核状态
     * @method QuerySmsTemplate
     * @param string $TemplateCode 模板Code
     */
    protected $QuerySmsTemplate = [
        'TemplateCode'
    ];

    /**
     * 删除短信模板
     * @method DeleteSmsTemplate
     * @param string $TemplateCode 模板Code
     */
    protected $DeleteSmsTemplate = [
        'TemplateCode'
    ];

    /**
     * 申请短信模板
     * @method AddSmsTemplate
     * @param string TemplateName 模板名称
     * @param int TemplateType 模板类型
     * @param string TemplateContent 模板内容
     * @param string Remark 模板备注
     */
    protected $AddSmsTemplate = [
        'TemplateName',
        'TemplateType',
        'TemplateContent',
        'Remark'
    ];

    /**
     * 修改未通过审核的短信模板
     * @method ModifySmsTemplate
     * @param string $TemplateCode 模板Code
     * @param string TemplateName 模板名称
     * @param int TemplateType 模板类型
     * @param string TemplateContent 模板内容
     * @param string Remark 模板备注
     */
    protected $ModifySmsTemplate = [
        'TemplateCode',
        'TemplateName',
        'TemplateType',
        'TemplateContent',
        'Remark'
    ];

}