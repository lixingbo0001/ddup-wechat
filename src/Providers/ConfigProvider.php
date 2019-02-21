<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2019/1/21
 * Time: 下午5:15
 */

namespace Ddup\Payments\Providers;


use Ddup\Wechat\Kernel\Application;
use Ddup\Wechat\Config\MiniAccount;
use Ddup\Wechat\Config\OfficialAccount;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ConfigProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        if ($pimple instanceof Application) {
            $pimple->mini_config     = new MiniAccount();
            $pimple->official_config = new OfficialAccount();
        }
    }

}