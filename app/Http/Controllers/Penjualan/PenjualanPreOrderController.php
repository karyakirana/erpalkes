<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Mine\SubPembelian\PembelianPreorderRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PenjualanPreOrderController extends Controller
{
    public function index()
    {
        return view('pages.penjualan.penjualan-preorder-index');
    }

    /**
     * @param Request $request
     * @return JsonResponse|null
     */
    public function datatables(Request $request)
    {
        if($request->ajax()){
            $data = PembelianPreorderRepository::getAllCurrentActiveCash();
            return DataTables::of($data)->make(true);
        }
        return null;
    }

    public function destroy(Request $request)
    {
        //
    }
}
