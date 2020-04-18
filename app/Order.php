<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderItem;

class Order extends Model
{
    protected $table = 'orders';

    public function getOrdersToUser($user_id)
    {
        return $this->where('user_id', $user_id)->with('items.product')->get();
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
