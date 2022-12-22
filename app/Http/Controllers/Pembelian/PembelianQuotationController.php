<?php

namespace App\Http\Controllers\Pembelian;

use App\Http\Controllers\Controller;
use App\Mine\SubPembelian\PembelianQuotationRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PembelianQuotationController extends Controller
{
    public function index()
    {
        return view('pages.pembelian.pembelian-quotation-index');
    }

    /**
     * @param Request $request
     * @return JsonResponse|null
     */
    public function datatables(Request $request)
    {
        if($request->ajax()){
            $data = PembelianQuotationRepository::getAllCurrentActiveCash();
            return DataTables::if($data)
                ->make(true);
        }
        return null;
    }

    public function destroy(Request $request)
    {
        //
    }
}
