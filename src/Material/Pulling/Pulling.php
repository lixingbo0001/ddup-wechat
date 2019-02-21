<?php
/**
 * Created by PhpStorm.
 * User: lixingbo
 * Date: 2019/2/13
 * Time: 下午2:42
 */

namespace Ddup\Wechat\Material\Pulling;


use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Pulling
{
    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    private function make()
    {
        $namespace = Str::studly($this->type);

        $target = __NAMESPACE__ . '\\Pulling\\' . $namespace . '\\Transfomer';

        return new $target;
    }

    function pull($start, $limit)
    {
        $items = $this->limit($start, $limit);

        $transfomer = $this->make();

        foreach ($items as $item) {
            $data = $transfomer->transfomer(new Collection($item));

            $this->save($data);
        }
    }

    function limit($start, $limit)
    {
        return [];
    }

    function save($data)
    {
    }
}