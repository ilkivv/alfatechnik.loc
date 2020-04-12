<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Cart
{
    function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function addCart($product_id, $quantity)
    {

        return $this;
    }

    public function removeCart()
    {
        
    }

    public function clearCart()
    {
        
    }

    public function getUser()
    {
        
    }
}
