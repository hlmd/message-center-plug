<?php
declare (strict_types=1);

namespace message\service;

/**
 * Class Send
 * @package message\service
 */
class Send extends Base
{

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
     * 设置发送者
     * @param $from
     * @return $this
     */
    public function setFrom($from): Base
    {
        $this->data['from'] = $from;
        return $this;
    }

    /**
     * 设置接收者
     * @param $to
     * @return $this
     */
    public function setTo($to): Base
    {
        $this->data['to'] = $to;
        return $this;
    }
}