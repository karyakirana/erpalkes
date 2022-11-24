<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Supplier;
use DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return view('pages.master.supplier-index');
    }

    /**
     * @param Request $request
     * @return JsonResponse|null
     */
    public function datatables(Request $request)
    {
        if ($request->ajax()){
            $data = Supplier::latest();
            return DataTables::of($data)
                ->make(true);
        }
        return null;
    }

    public function destroy(Request $request)
    {
        return Supplier::destroy($request->id);
    }
}
