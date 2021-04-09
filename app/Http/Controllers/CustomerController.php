<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repositories\CustomersRepository;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * @var CustomersRepository
     */
    private $customerRepository;

    public function __construct(CustomersRepository $customers)
    {
        $this->customerRepository = $customers;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if ($request->has('group_by')) {
                if ($request->get('group_by') === 'country') {
                    return response($this->customerRepository->allCustomersByCountry());
                }
            }
            return response(Customer::all());
        }catch (\Exception $e){
            return response(['message'=>$e->getMessage()]);
        }
    }

    public function show(Request $request){
        $this->validate($request,['customer_number'=>'required|exists:customers,customerNumber']);
        try{
            return response(
                $this->customerRepository
                    ->customerByNumberWithout($request->customer_number, ['creditLimit']));
        }catch (\Exception $e){
            return response(['message'=>$e->getMessage()]);
        }
    }
}
