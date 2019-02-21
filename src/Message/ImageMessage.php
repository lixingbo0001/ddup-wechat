<?php namespace Ddup\Wechat\Message;


use Ddup\Wechat\Contracts\MessageAbsctracts;
use EasyWeChat\Kernel\Messages\Image;
use EasyWeChat\Kernel\Messages\Message;
use Illuminate\Support\Collection;

class ImageMessage extends MessageAbsctracts
{


    public function transform(Collection $material):Message
    {
        return new Image($material->get('media_id'));
    }

}

