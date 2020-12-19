<?php

namespace App\Http\Controllers\API;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::customers();
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['string', 'required'],
            'mobile_number' => ['required', 'numeric', 'digits:11'],
            'address' => ['required', 'string', 'between:10,300'],
        ]);

        $customer = Customer::create($data);

        return $customer;
    }

    public function read(Customer $customer)
    {
        return $customer;
    }

    public function update(Customer $customer, Request $request)
    {
        $data = $request->validate([
            'name' => ['string', 'required'],
            'mobile_number' => ['required', 'numeric', 'digits:11'],
            'address' => ['required', 'string', 'between:10,300']
        ]);

        $customer->update($data);

        return $customer;
    }

    public function delete(Customer $customer)
    {
        $customer->delete();
    }
}
