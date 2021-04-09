<?php


namespace App\Repositories;


use App\Models\Customer;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class CustomersRepository
{
    public function allCustomersByCountry(){
        $consumerCliente = new Client();
        return Customer::all()
            ->groupBy('country')
            ->map(function($customers, $country) use ($consumerCliente){
                $countryInfo = '';
                try {
                    $res = $consumerCliente->request('GET', "https://restcountries.eu/rest/v2/name/$country", [
                        'headers' => [
                            'Accept' => 'application/json'
                        ],
                    ]);
                    if ($res->getStatusCode() == 200) {
                        $countryInfo = json_decode($res->getBody()->getContents());
                    }
                } catch (GuzzleException $e) {
                    logger("Error line({$e->getMessage()}):" . $e->getMessage());
                }
                if(empty($countryInfo))
                    $capital = '';
                else
                    $capital = $countryInfo[0]->capital;

                return ['capital'=>$capital, 'qty_costumers'=>$customers->count()];
            });
    }

    public function customerByNumberWithout($customer_number, $except_fields = []){
        return Customer::find($customer_number)->makeHidden($except_fields);
    }
}
