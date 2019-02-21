<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/7/8
 * Time: 下午2:04
 */

namespace Ddup\Wechat\Material;


use Ddup\Wechat\Contracts\MaterialDispoter;
use Illuminate\Support\Collection;

class CardMaterial implements MaterialDispoter
{
    public function save(Collection &$material)
    {
    }

    public function updateUpload(Collection &$material)
    {
    }

    public function upload(Collection &$material)
    {
    }
}