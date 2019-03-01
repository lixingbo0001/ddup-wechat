<?php

namespace Ddup\Wechat\Contracts;


interface WxOauthListenAble
{
    function wxOAuthComplete($user);
}