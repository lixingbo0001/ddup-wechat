<?php namespace Ddup\Wechat\Kernel;


use Ddup\Wechat\Providers\ConfigProvider;
use Ddup\Wechat\Providers\LogProvider;
use Ddup\Wechat\Providers\SessionProvider;
use Ddup\Wechat\Config\MiniAccount;
use Ddup\Wechat\Config\OfficialAccount;
use Ddup\Wechat\Contracts\SessionInterface;
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
        ConfigProvider::class,
        SessionProvider::class
    ];

    public function __construct(array $values = array())
    {
        parent::__construct($values);

        $this->registerProviders();

        $this->initApp();
    }

    private function initApp()
    {
        $config = $this->official_config->toArray();
        $app    = \EasyWeChat\Factory::officialAccount($config);

        $this->official_app = $app;

        $config = $this->mini_config->toArray();
        $app    = \EasyWeChat\Factory::miniProgram($config);

        $this->mini_app = $app;

        $this->official_app->register(new LogProvider());
        $this->mini_app->register(new LogProvider());
    }

    private function registerProviders()
    {
        foreach ($this->providers as $provider) {
            parent::register(new $provider);
        }
    }
}