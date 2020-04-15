<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function __construct()
    {
    }

    public function profile(Order $orderModel, User $userModel)
    {
        $user_id = $userModel->getId();
        $orders = $orderModel->getOrdersToUser($user_id);
        return view('shop.profile', ['orders' => $orders]);
    }

    public function wishlist()
    {
        return view('shop.wishlist');
    }
}
