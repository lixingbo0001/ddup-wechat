<?php

namespace Ddup\Wechat\Contracts;


interface WxOauthListenAble
{
    function WxOAuthComplete($user);
}