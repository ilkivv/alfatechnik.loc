<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curl;

class City extends Model
{
    protected $table = 'cities';

    public function getCity()
    {
        $cookieModel = new CookieClass();
        $curl = new Curl();
        //$ip = $_SERVER['REMOTE_ADDR'];
        $ip = '37.21.138.64';
        $url = 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/iplocate/address?token=7c3435b1d55382e6dfd6f89e3faeca41f6c9730e&ip='. urlencode($ip);
        //получили куки по курл
        $currentCity = $curl->getCurl($url);
        //усиановили значение куки
        $cookieModel->setVariableCookie('city', $currentCity['location']['value'], 60);
        //сравнили со значение из бд
        //$cityDB = $this->where('fias', $currentCity['location']['data']['region_fias_id'])->first();
        return $currentCity['location']['value'];
    }
}
