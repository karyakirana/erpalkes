<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Customer;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        return view('pages.master.customer-index');
    }

    public function show($customer_id)
    {
        return view('pages.master.customer-show', ['customer_id' => $customer_id]);
    }

    public function destroy(Request $request)
    {
        return Customer::destroy($request->id);
    }
}
