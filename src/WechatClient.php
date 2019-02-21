<?php namespace Ddup\Wechat;


use Ddup\Part\Api\ApiResultInterface;
use Ddup\Part\Api\ApiResulTrait;
use Ddup\Wechat\Kernel\Application;
use Ddup\Wechat\Config\WechatApiResult;

class WechatClient extends Application
{
    use ApiResulTrait;

    public function newResult($ret):ApiResultInterface
    {
        return new WechatApiResult($ret);
    }
}