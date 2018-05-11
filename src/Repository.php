<?php

namespace Kubill\LaraSms;


use Kubill\LaraSms\Contracts\Store;
use \Kubill\LaraSms\Contracts\Repository as RepositoryInterface;

class Repository implements RepositoryInterface
{
    /**
     * The cache store implementation.
     *
     * @var \Illuminate\Contracts\Cache\Store
     */
    protected $store;

    /**
     * Create a new cache repository instance.
     *
     * @param  \Kubill\LaraSms\Contracts\Store;  $store
     * @return void
     */
    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    /**
     * 推送消息
     *
     * @param  string $msg
     * @param  string $mobile
     * @return array|mixed
     */
    public function send($msg, $mobile)
    {
        return $this->store->send($msg, $mobile);
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
        return $this->store->batchSend($msg, $mobile);
    }
}
