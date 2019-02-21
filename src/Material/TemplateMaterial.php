<?php

namespace Ddup\Wechat\Material;


use Ddup\Wechat\Contracts\MaterialDispoter;
use Illuminate\Support\Collection;

class TemplateMaterial implements MaterialDispoter
{

    public function save(Collection &$material)
    {
        return false;
    }

    public function updateUpload(Collection &$material)
    {
        return true;
    }

    public function upload(Collection &$material)
    {
        return true;
    }

    public function getFilter($row)
    {
        $row->param = json_decode($row->param, true);
        return $row;
    }

}