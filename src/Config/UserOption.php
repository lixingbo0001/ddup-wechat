<?php

namespace Ddup\Wechat\Config;


use Ddup\Part\Struct\StructReadable;

class UserOption extends StructReadable
{
    public $id;
    public $openid;
    public $unionid;
    public $nickname;
    public $avatar;
    public $language;
    public $city;
    public $province;
    public $country;
    public $headimgurl;
}