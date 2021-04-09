<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Repositories\OrdersRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * @var OrdersRepository
     */
    private $orderRepository;

    public function __construct(OrdersRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->validate($request, ['customer_number'=>'exists:customers,customerNumber']);
        try{
            if($request->has('customer_number'))
                return response($this->orderRepository->getOrdersByUserWithDetails($request->customer_number));

            return response($this->orderRepository->all());
        }catch(\Exception $e){
            return response(['message'=>$e->getMessage()]);
        }
    }
}
