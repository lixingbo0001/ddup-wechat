<?php

namespace Ddup\Wechat\Config;


use Ddup\Part\Struct\StructReadable;

class OfficialAccount extends StructReadable
{
    public $app_id;
    public $secret;
    public $token;
    public $aes_key;
    public $debug;
    public $oauth = [
        'scopes'   => [],
        'callback' => ''
    ];
}