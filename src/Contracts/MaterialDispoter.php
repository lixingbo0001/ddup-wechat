<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/7/8
 * Time: 下午12:13
 */

namespace Ddup\Wechat\Contracts;

use Illuminate\Support\Collection;

interface  MaterialDispoter
{
    function save(Collection &$material);

    function upload(Collection &$material);

    function updateUpload(Collection &$material);
}