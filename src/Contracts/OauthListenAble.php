<?php

namespace Ddup\Wechat\Contracts;


use Ddup\Wechat\Config\UserOption;

interface OauthListenAble
{
    function OAuthComplete(UserOption $user, $user_param);
}