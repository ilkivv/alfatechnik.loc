<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function __construct()
    {
    }

    public function profile()
    {
        return view('shop.profile');
    }

    public function wishlist()
    {
        return view('shop.wishlist');
    }
}
