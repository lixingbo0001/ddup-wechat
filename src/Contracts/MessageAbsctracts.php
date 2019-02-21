<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/7/15
 * Time: 下午12:37
 */

namespace Ddup\Wechat\Contracts;


use Ddup\Part\Libs\Time;
use Ddup\Wechat\Kernel\Application;
use Ddup\Wechat\Struct\Message\MessageStruct;
use EasyWeChat\Kernel\Messages\Message;
use Illuminate\Support\Collection;

abstract class MessageAbsctracts
{

    protected $app;
    protected $message;

    public function __construct(MessageStruct $message, Application $app)
    {
        $this->app = $app;

        $this->message = $message;

        $this->message->openid = $message->FromUserName;
        $this->message->appid  = $message->ToUserName;
        $this->message->date   = Time::date();
    }

    abstract function transform(Collection $material):Message;
}