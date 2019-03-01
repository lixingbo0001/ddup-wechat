<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2019/1/21
 * Time: 下午5:15
 */

namespace Ddup\Wechat\Providers;


use Ddup\Wechat\Kernel\Application;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        if ($pimple instanceof Application) {

            $pimple->official_app = function () use ($pimple) {
                $app = \EasyWeChat\Factory::officialAccount($pimple->official_config->toArray());

                $app->logger = $pimple->logger;

                return $app;
            };

            $pimple->mini_app = function () use ($pimple) {
                $app = \EasyWeChat\Factory::miniProgram($pimple->mini_config->toArray());

                $app->logger = $pimple->logger;

                return $app;
            };

        }
    }

}