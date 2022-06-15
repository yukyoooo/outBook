<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Services\CustomerService;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    public function getCustomers(CustomerService $customer_service): \Illuminate\Http\JsonResponse
    {
        return response()->json($customer_service->getCustomers());
    }

    public function postCustomers(Request $request, CustomerService $customer_service)
    {
        $this->validate($request, ['name' => 'required']);
        $customer_service->addCustomer($request->json('name'));
    }

    public function getCustomer($customer_id, CustomerService $customer_service)
    {
        if(!$customer_service->exists($customer_id)){
            abort(Response::HTTP_NOT_FOUND);
        }
        return $customer_service->getCustomer($customer_id);
    }

    public function putCustomer($customer_id, Request $request, CustomerService $customer_service)
    {
        if(!$customer_service->exists($customer_id)){
            abort(Response::HTTP_NOT_FOUND);
        }
        $this->validate($request, ['name' => 'required']);
        $customer_service->updateCustomer($customer_id, $request->json('name'));
    }

    public function deleteCustomer($customer_id, CustomerService $customer_service)
    {
        logger($customer_id);
        if(!$customer_service->exists($customer_id)){
            abort(Response::HTTP_NOT_FOUND);
        }
        if($customer_service->hasReports($customer_id)){
            abort(Response::HTTP_UNPROCESSABLE_ENTITY);
        }
//        $customer_service->deleteCustomer($customer_id);
    }

}
