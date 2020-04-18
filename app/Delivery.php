<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'deliveries';

    public function getDeliveries()
    {
        return $this->where('active', 1)->get();
    }
}
