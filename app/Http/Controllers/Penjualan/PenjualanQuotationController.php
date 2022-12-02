<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Mine\SubPenjualan\PenjualanQuotationRepository;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PenjualanQuotationController extends Controller
{
    public function index()
    {
        return view('pages.penjualan.penjualan-quotation-index');
    }

    /**
     * @param Request $request
     * @return JsonResponse|null
     */
    public function datatables(Request $request)
    {
        if($request->ajax()){
            $data = PenjualanQuotationRepository::getAllCurrentActiveCash();
            return DataTables::of($data)
                ->make(true);
        }
        return null;
    }

    public function destroy(Request $request)
    {
        //
    }
}
