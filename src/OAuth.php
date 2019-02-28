<?php namespace Ddup\Wechat;


use Ddup\Part\Libs\Helper;
use Ddup\Part\Libs\Url;
use Ddup\Wechat\Contracts\OauthListenAble;

class OAuth extends WechatClient
{

    protected $option;

    private function oauth($callback)
    {
        $app = $this->official_app;

        $app->config = $app->config->merge([
            'oauth' => [
                'scopes'   => ['snsapi_base'],
                'callback' => $callback,
            ],
        ]);

        return $app->oauth;
    }

    public function getRedirect($target, $callback)
    {
        self::sessionSave([
            'target_url' => $target
        ]);

        $callback = Url::query($callback, [
            'target_url' => $target
        ]);

        return $this->oauth($callback)->redirect();
    }

    protected function sessionUser()
    {
        return $this->session->get('wechat_user', []);
    }

    public function hasNotOauth()
    {
        return empty($this->sessionUser());
    }

    public function base(OauthListenAble $listenAble, $target, $callback)
    {
        $wechat_user = $this->sessionUser();

        if ($this->hasNotOauth()) {
            return $this->getRedirect($target, $callback);
        }

        $listenAble->OAuthComplete($wechat_user);

        return false;
    }

    public function oauthUser()
    {
        return $this->official_app->oauth->user();
    }

    private function sessionSave($data)
    {
        $this->session->value($data);
    }

    public function callback($target_url)
    {
        self::sessionSave([
            'wechat_user' => Helper::toArray($this->oauthUser())
        ]);

        return $this->session->get('target_url', $target_url);
    }
}