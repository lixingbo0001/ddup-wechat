<?php namespace Ddup\Wechat;


use Ddup\Part\Libs\Helper;
use Ddup\Part\Request\Query;
use Ddup\Wechat\Contracts\WxOauthListenAble;

class OAuth extends WechatClient
{

    private function oauth($target)
    {
        $config = $this->_app->official_config;

        $callback = array_get($config->oauth, 'callback');

        $query = new Query($callback, [
            'target_url' => $target
        ]);

        $config->oauth = [
            'scopes'   => ['snsapi_base'],
            'callback' => $query->getString(),
        ];

        $app = \EasyWeChat\Factory::officialAccount($config->toArray());

        return $app->oauth;
    }

    public function getRedirect($target)
    {
        self::sessionSave([
            'target_url' => $target
        ]);

        return new Query($this->oauth($target)->redirect()->getTargetUrl());
    }

    protected function sessionUser()
    {
        return $this->session()->get('wechat_user', []);
    }

    public function hasNotOauth()
    {
        return empty($this->sessionUser());
    }

    public function base(WxOauthListenAble $listenAble, $target)
    {
        $wechat_user = $this->sessionUser();

        if ($this->hasNotOauth()) {
            return $this->getRedirect($target);
        }

        return $listenAble->wxOAuthComplete($wechat_user);
    }

    public function oauthUser()
    {
        return $this->_app->official_app->oauth->user();
    }

    private function sessionSave($data)
    {
        $this->session()->value($data);
    }

    public function callback($target_url)
    {
        self::sessionSave([
            'wechat_user' => Helper::toArray($this->oauthUser())
        ]);

        return $this->session()->get('target_url', $target_url);
    }
}