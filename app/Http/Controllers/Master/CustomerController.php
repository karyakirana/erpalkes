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

    /**
     * @throws Exception
     */
    public function datatables(Request $request)
    {
        if($request->ajax()){
            $data = Customer::with(['area'])
                ->latest();
            return DataTables::of($data)
                ->make(true);
        }
        return null;
    }

    public function destroy(Request $request)
    {
        return Customer::destroy($request->id);
    }
}
