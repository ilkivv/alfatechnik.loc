<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class CookieClass
{
    private $cookie;

    public function __construct()
    {
        $this->cookie = new Cookie();
    }

    public function getVariableCookie($variable)
    {
        return $this->cookie->get($variable);
    }

    public function setVariableCookie($variable, $value, $time)
    {
        return Cookie::queue($variable, $value, $time);
    }
}
