<?php namespace Ddup\Wechat\Message;

use Ddup\Wechat\Contracts\MessageAbsctracts;
use EasyWeChat\Kernel\Messages\Message;
use EasyWeChat\Kernel\Messages\Raw;
use EasyWeChat\OfficialAccount\Card\Card;
use Illuminate\Support\Collection;

class CardMessage extends MessageAbsctracts
{


    public function transform(Collection $material):Message
    {
        $card = new Card($material->get('card_id'));

        $this->app->official_app->customer_service->message($card)->to($this->message->openid)->send();

        return new Raw('');
    }

}