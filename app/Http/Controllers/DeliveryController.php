<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sdek;

class DeliveryController extends Controller
{
    public function deliveryCalc(Request $request, Sdek $sdekModel)
    {
        $cart = $request->all();
        if ($cart['delivery_id'] == 1){
            return $sdekModel->getDeliveryCalc($cart);
        }else if ($cart['delivery_id'] == 2){

        }else if ($cart['delivery_id'] == 3){
            $result['result']['price'] = 0;
            return $result;
        }

    }

    public function cityDelivery(Request $request, Sdek $sdekModel)
    {
        return $sdekModel->getCityDelivery($request->all());
    }
}
