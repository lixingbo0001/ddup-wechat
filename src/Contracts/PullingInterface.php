<?php

namespace Ddup\Wechat\Contracts;


use Illuminate\Support\Collection;

interface PullingInterface
{
    function pull($start, $limit);

    function getData(Collection $item);

    function getCount();
}