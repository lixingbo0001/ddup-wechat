<?php

namespace Ddup\Wechat\Contracts;


interface SessionInterface
{
    function set($name, $value);

    function get($name, $default = null);

    function value($value = null);
}