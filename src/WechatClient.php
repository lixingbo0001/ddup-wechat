<?php namespace Ddup\Wechat;


use Ddup\Part\Api\ApiResultInterface;
use Ddup\Part\Api\ApiResulTrait;
use Ddup\Wechat\Kernel\Application;
use Ddup\Wechat\Config\WechatApiResult;

class WechatClient
{
    protected $_app;

    use ApiResulTrait;

    public function newResult($ret):ApiResultInterface
    {
        return new WechatApiResult($ret);
    }

    public function __construct(Application $app)
    {
        $this->_app = $app;
    }

    protected function session()
    {
        return $this->_app->session;
    }
}