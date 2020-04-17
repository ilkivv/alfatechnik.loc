<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sdek;

class DeliveryController extends Controller
{
    public function deliveryCalc(Request $request, Sdek $sdekModel)
    {
        return $sdekModel->getDeliveryCalc($request->all());
    }

    public function cityDelivery(Request $request, Sdek $sdekModel)
    {
        return $sdekModel->getCityDelivery($request->all());
    }
}
