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

class SessionProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        if ($pimple instanceof Application) {

        }
    }

}