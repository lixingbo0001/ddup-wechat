<?php namespace Ddup\Wechat\Kernel;


use Ddup\Part\Session\SessionInterface;
use Ddup\Wechat\Providers\ServiceProvider;
use Ddup\Wechat\Providers\SessionProvider;
use Ddup\Wechat\Config\MiniAccount;
use Ddup\Wechat\Config\OfficialAccount;
use Pimple\Container;
use Psr\Log\LoggerInterface;

/**
 * Class Application
 * @property LoggerInterface logger
 * @property SessionInterface session
 * @property OfficialAccount official_config
 * @property MiniAccount mini_config
 * @property \EasyWeChat\OfficialAccount\Application official_app
 * @property \EasyWeChat\MiniProgram\Application mini_app
 * @package Ddup\Wechat
 */
class Application extends Container
{

    private $providers = [
        ServiceProvider::class,
        SessionProvider::class
    ];

    public function __construct(array $values = array())
    {
        parent::__construct($values);

        $this->registerProviders();
    }

    private function registerProviders()
    {
        foreach ($this->providers as $provider) {
            parent::register(new $provider);
        }
    }

    public function __get($name)
    {
        return $this->offsetGet($name);
    }

    public function __set($name, $value)
    {
        $this->offsetSet($name, $value);
    }
}