<?php

namespace Ddup\Wechat\Config;


use Ddup\Part\Struct\StructReadable;

class MiniAccount extends StructReadable
{
    public $app_id;
    public $secret;
    public $token;
    public $aes_key;
}