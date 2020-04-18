<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curl;

class Sdek extends Model
{
    protected $table = 'cities';

    public function getDeliveryCalc($request)
    {
        $tariffList = [
            ['id' => 1],
            ['id' => 11],
            ['id' => 12],
            ['id' => 13],
            ['id' => 14],
        ];
        $array = [
            'version'   => '1.0',
            'dateExecute' => date('Y-m-d'), //Планируемая дата отправки заказа в формате “ГГГГ-ММ-ДД”
            'senderCityId' => '270',//Код города отправителя из базы СДЭК
            'receiverCityId' => $request['receiverCityId'],//Код города получателя из базы СДЭК
            'tariffId' => '10',//Код выбранного тарифа (подробнее см. приложение 1)
            'goods' => [ //Габаритные характеристики упаковки
                [
                    'weight' => $request['weight'],
                    'length' => $request['length'],
                    'width' => $request['width'],
                    'height' => $request['height'],
                ]

            ]
        ];
        $curlModel = new Curl();
        $url = 'http://api.edostavka.ru/calculator/calculate_price_by_json.php';
        return $curlModel->postCurl($url, $array);
    }

    public function getCityDelivery($request)
    {
        return $this->select('id', 'full_name', 'obl_name')->where('city_name', 'LIKE', $request['city_delivery'] . '%')->limit(10)->get()->toArray();
    }
}
