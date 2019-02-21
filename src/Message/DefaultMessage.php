<?php namespace Ddup\Wechat\Message;

use Ddup\Wechat\Contracts\MessageAbsctracts;
use EasyWeChat\Kernel\Messages\Message;
use EasyWeChat\Kernel\Messages\Raw;
use Illuminate\Support\Collection;

class DefaultMessage extends MessageAbsctracts {

    public function transform(Collection $material) : Message
    {
        return new Raw('');
    }

}