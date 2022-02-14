<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Report;

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

    public function getCustomer($customer_id)
    {
        return Customer::query()
            ->where('id', '=', $customer_id)
            ->select(['id', 'name'])
            ->first();
    }

    public function updateCustomer($customer_id, $name)
    {
        $customer = Customer::query()->select(['id', 'name'])->find($customer_id);
        $customer->name = $name;
        $customer->save();
    }

    public function deleteCustomer($customer_id)
    {
        Customer::query()->where('id', '=', $customer_id)->delete();
    }

    /**
     * @param $customer_id
     * @return bool
     */
    public function exists($customer_id): bool
    {
        return Customer::query()->where('id', '=', $customer_id)->exists();
    }

    /**
     * @param $customer_id
     * @return bool
     */
    public function hasReports($customer_id): bool
    {
        return Report::query()->where('customer_id', '=', $customer_id)->exists();
    }
}
