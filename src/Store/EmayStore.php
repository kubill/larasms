<?php

namespace Kubill\LaraSms\Store;


use Kubill\LaraSms\Contracts\Store;

class EmayStore implements Store
{

    /**
     * 发送短信
     *
     * @param  string $msg
     * @param  string $mobile
     * @return array|mixed
     */
    public function send($msg, $mobile)
    {
        // TODO: Implement send() method.
    }

    /**
     * 批量发送短信
     *
     * @param string $msg
     * @param  array $mobile
     * @return mixed
     */
    public function batchSend($msg, array $mobile)
    {
        // TODO: Implement batchSend() method.
    }
}