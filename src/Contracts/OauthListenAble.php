<?php

namespace Ddup\Wechat\Contracts;


interface OauthListenAble
{
    function OAuthComplete($user, $user_param);
}