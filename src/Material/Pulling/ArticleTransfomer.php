<?php

namespace Ddup\Wechat\Material\Pulling;


use Illuminate\Support\Collection;

class ArticleTransfomer
{
    function transfomer(Collection $item):Collection
    {

        $content  = new Collection($item->get('content'));
        $articles = $content->get('news_item', []);

        $first = array_get($articles, 0, []);
        $title = array_get($first, 'title', '');

        return new Collection([
            'media_id' => $item->get('media_id'),
            'articles' => json_encode($articles, JSON_UNESCAPED_UNICODE),
            'name'     => $title
        ]);
    }
}