<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2019/2/6
 * Time: 下午12:38
 */

namespace Ddup\Wechat\Struct\Message;


use Ddup\Part\Struct\StructCompleteReadable;

class MessageStruct extends StructCompleteReadable
{
    public $FromUserName;
    public $ToUserName;
    public $date;
    public $openid;
    public $appid;
}