<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Mine\SubPenjualan\PenjualanRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PenjualanController extends Controller
{
    public function index()
    {
        return view('pages.penjualan.penjualan-index');
    }

    /**
     * @param Request $request
     * @return JsonResponse|null
     */
    public function datatables(Request $request)
    {
        if($request->ajax()){
            $data = PenjualanRepository::getAllCurrentActiveCash();
            return DataTables::of($data)->make(true);
        }
        return null;
    }

    public function destroy(Request $request)
    {
        //
    }
}
