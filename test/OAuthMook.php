<?php namespace Ddup\Wechat\Test;


use Ddup\Wechat\OAuth;

class OAuthMook extends OAuth
{

    private $mook;

    public function __construct($mook)
    {
        $this->mook = $mook;
    }

    protected function sessionUser()
    {
        return $this->mook;
        
    }
}