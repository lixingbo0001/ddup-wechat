<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2018/7/8
 * Time: 下午2:04
 */

namespace Ddup\Wechat\Material;


use Ddup\Wechat\Contracts\MaterialDispoter;
use Ddup\Wechat\Exceptions\MaterialException;
use Illuminate\Support\Collection;

class MusicMaterial implements MaterialDispoter
{

    public function save(Collection &$material)
    {
        throw  new MaterialException('功能开发中...');
    }

    public function updateUpload(Collection &$material)
    {
        throw  new MaterialException('音乐素材不支持修改');
    }

    public function upload(Collection &$material)
    {
        throw  new MaterialException('功能开发中...');
    }
}