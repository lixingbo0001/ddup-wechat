<?php

namespace Ddup\Wechat\Contracts;


interface WxOauthListenAble
{
    function OAuthComplete($user);
}