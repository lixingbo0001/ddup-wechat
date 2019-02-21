<?php namespace Ddup\Wechat\Message;

use Ddup\Wechat\Contracts\MessageAbsctracts;
use EasyWeChat\Kernel\Messages\Message;
use EasyWeChat\Kernel\Messages\Text;
use Illuminate\Support\Collection;

class TextMessage extends MessageAbsctracts
{


    public function transform(Collection $material):Message
    {
        $content = $material->get('content');

        $variables = $this->message->toArray();

        foreach ($variables as $name => $variable) {
            $content = str_replace("[:{$name}]", $variable, $content);
        }

        return new Text($content);
    }

}