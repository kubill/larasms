<?php

namespace Kubill\LaraSms;


use InvalidArgumentException;
use Kubill\LaraSms\Contracts\Store;
use Kubill\LaraSms\Store\EmayStore;

class SmsManager
{
    /**
     * 应用实例
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * 实例存储数组
     *
     * @var array
     */
    protected $stores = [];

    /**
     * 创建管理器实例
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * 从本地的stores变量中获取仓库
     *
     * @param  string $name
     * @return \Kubill\LaraSms\Contracts\Repository
     */
    protected function get($name)
    {
        return $this->stores[$name] ?? $this->resolve($name);
    }

    /**
     * 根据名称创建缓存驱动
     *
     * @param  string $name
     * @return \Kubill\LaraSms\Contracts\Repository
     *
     * @throws \InvalidArgumentException
     */
    protected function resolve($name)
    {
        $config = $this->getConfig($name);

        if (is_null($config)) {
            throw new InvalidArgumentException("Sms store [{$name}] is not defined.");
        }

        $driverMethod = 'create' . ucfirst($config['driver']) . 'Driver';

        if (method_exists($this, $driverMethod)) {
            return $this->{$driverMethod}($config);
        } else {
            throw new InvalidArgumentException("Driver [{$config['driver']}] is not supported.");
        }
    }

    /**
     * 根据名字获取存储实例
     *
     * @param  string|null $name
     * @return \Kubill\LaraSms\Contracts\Repository
     */
    public function store($name = null)
    {
        $name = $name ?: $this->getDefaultDriver();

        return $this->stores[$name] = $this->get($name);
    }

    /**
     * 通过给定的存储实现创建一个库
     *
     * @param  \Kubill\LaraSms\Contracts\Store $store
     * @return \Kubill\LaraSms\Repository
     */
    public function repository(Store $store)
    {
        $repository = new Repository($store);
        return $repository;
    }

    /**
     * 获取驱动的配置
     *
     * @param  string $name
     * @return array
     */
    protected function getConfig($name)
    {
        return $this->app['config']["larasms.stores.{$name}"];
    }

    //todo add more provider

    /**
     * 创建极光驱动实例
     *
     * @return \Kubill\LaraSms\Store\EmayStore
     */
    protected function createEmayDriver()
    {
        return $this->repository(new EmayStore);
    }

    /**
     * 获取默认的驱动名称
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['larasms.default'];
    }

    /**
     * 动态调用默认驱动程序实例。
     *
     * @param  string $method
     * @param  array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->store()->$method(...$parameters);
    }
}
