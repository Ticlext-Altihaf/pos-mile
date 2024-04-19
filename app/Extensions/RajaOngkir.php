<?php

namespace App\Extensions;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class RajaOngkir
{

    public static string $url = 'https://api.rajaongkir.com/starter';

    public static function provinces(): array
    {
        $cache_key = 'provinces';
        $provinces = Cache::get($cache_key);
        if (!$provinces) {
            $response = Http::withHeaders([
                'key' => config('app.raja_ongkir_api_key')
            ])->get(self::$url . '/province');
            $provinces = $response->json()['rajaongkir']['results'];
            Cache::put($cache_key, $provinces, 60 * 60 * 24 * 30);
        }
        return $provinces;
    }

    public static function province_options(): array
    {
        $provinces = self::provinces();
        $options = [];
        foreach ($provinces as $province) {
            $options[$province['province_id']] = $province['province'];
        }
        return $options;
    }

    private static function cities_0():array{
        $cache_key = 'cities';
        $cities = Cache::get($cache_key);
        if (!$cities) {
            $response = Http::withHeaders([
                'key' => config('app.raja_ongkir_api_key')
            ])->get(self::$url . '/city');
            $cities = $response->json()['rajaongkir']['results'];
            // map province_id => [...cities]
            $cities = collect($cities)->groupBy('province_id')->toArray();
            Cache::put($cache_key, $cities, 60 * 60 * 24 * 30);
        }
        return $cities;
    }

    public static function cities($province_id): array
    {
        $cities = self::cities_0();
        return $cities[$province_id] ?? [];
    }

    public static function city_options($province_id): array
    {
        $cities = self::cities($province_id);
        $options = [];
        foreach ($cities as $city) {
            $options[$city['city_id']] = $city['city_name'];
        }
        return $options;
    }

    public static function city_id_to_name($city_id): string
    {
        $cities = self::cities_0();
        foreach($cities as $province_cities){
            foreach($province_cities as $city){
                if($city['city_id'] == $city_id){
                    return $city['city_name'];
                }
            }
        }
        return '';
    }

    public static function shipment_costs(int $origin, int $destination, int $weight): ?int
    {
        $cache_key = "shipment_cost_v1:$origin:$destination:$weight";
        $cost = Cache::get($cache_key);
        if ($cost) {
            return $cost;
        }
        $response = Http::withHeaders([
            'key' => config('app.raja_ongkir_api_key')
        ])->post(self::$url . '/cost', [
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => 'pos'
        ]);

        $cost = null;
        if(isset($response->json()['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'])){
            $cost = $response->json()['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
        }
        if(!$cost){
            Cache::put($cache_key, $cost, 60 * 1);// 1 minutes
            return null;
        }
        Cache::put($cache_key, $cost, 60 * 30);// 30 minutes
        return $cost;
    }

    public static function province_id(string $province)
    {
        $provinces = self::provinces();
        foreach ($provinces as $p) {
            if ($p['province'] == $province) {
                return $p['province_id'];
            }
        }
        return null;
    }

}
