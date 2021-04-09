<?php


namespace App\Repositories;


use App\Models\Customer;
use App\Models\Order;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class OrdersRepository
{
    /**
     * @param $customer_number
     * @return mixed
     */
    public function getOrdersByUserWithDetails($customer_number){
        return Order::where('customerNumber', '=', $customer_number)
            ->with('details')
            ->get();
    }

    /**
     * @return Order[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all(){
        return Order::all();
    }
}
