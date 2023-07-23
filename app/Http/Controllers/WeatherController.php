<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;


class WeatherController extends Controller
{
    //

    public function getLocation(Request $request) {
        $ip = $request->getClientIps();

        $myIp = "197.210.29.3";
        $myCity = "Lagos";

        $client = new Client();

        $response = $client->get(env('BASE_URL').'/current.json?key='.env('API_KEY').'&q='.$myIp);

        $data = json_decode($response->getBody(), true);
        $city = $data['location']['name'];
        $country = $data['location']['country'];
        $localTime = $data['location']['localtime'];
        $timeZone = $data['location']['tz_id'];

        $temp = $data['current']['temp_c'];
        $period = $data['current']['is_day'];
        $text = $data['current']['condition']['text'];
        $icon = $data['current']['condition']['icon'];
        $myData = ['country' => $country,
             'city'=> $city,
            'localTime' => $localTime,
            'timeZone' => $timeZone,
            'temp' => $temp,
            'period' => $period,
            'text' => $text,
            'icon' => $icon

        ];
        return view('dashboard', ['name'=>'Weather Information', 'data' => $myData]);
    }
}
