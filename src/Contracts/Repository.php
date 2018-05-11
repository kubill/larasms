<?php

namespace Kubill\LaraSms\Contracts;


interface Repository
{
    /**
     * 单条发送短信
     *
     * @param  string $msg
     * @param  string $mobile
     * @return array|mixed
     */
    public function send($msg, $mobile);

    /**
     * 批量发送短信
     *
     * @param string $msg
     * @param  array $mobile
     * @return mixed
     */
    public function batchSend($msg, array $mobile);
}
