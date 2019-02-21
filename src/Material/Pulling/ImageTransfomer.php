<?php

namespace Ddup\Wechat\Material\Pulling;


use Illuminate\Support\Collection;

class ImageTransfomer
{

    function transfomer(Collection $item):Collection
    {
        return new Collection([
            'media_id'  => $item->get('media_id'),
            'media_url' => $item->get('url'),
            "name"      => $item->get('name')
        ]);
    }
}