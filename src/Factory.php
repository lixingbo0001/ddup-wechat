<?php namespace Ddup\Wechat;

use Ddup\Wechat\Kernel\Application;
use Ddup\Wechat\Struct\Material\MaterialStruct;
use Ddup\Wechat\Struct\Message\MessageStruct;
use Illuminate\Support\Str;


class Factory
{

    private static function app()
    {
        return new Application();
    }

    static function message($type, MessageStruct $message)
    {
        $namespace = Str::studly($type);
        $target    = __NAMESPACE__ . '\\Message\\' . $namespace . 'Message';

        return new $target($message, self::app());
    }

    static function material(MaterialStruct $material)
    {
        $namespace = Str::studly($material->type);
        $target    = __NAMESPACE__ . '\\Material\\' . $namespace . 'Material';

        return new $target($material, self::app());
    }
}
