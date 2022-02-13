<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function getCustomers(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Customer::query()->select(['id', 'name'])->get();
    }

    public function addCustomer($name)
    {
        $customer = new Customer();
        $customer->name = $name;
        $customer->save();
    }
}
