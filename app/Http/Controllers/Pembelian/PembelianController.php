<?php

namespace App\Http\Controllers\Pembelian;

use App\Http\Controllers\Controller;
use App\Mine\SubPembelian\PembelianRepository;
use App\Models\Pembelian\Pembelian;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PembelianController extends Controller
{
    public function index()
    {
        return view('pages.pembelian.pembelian-index');
    }

    /**
     * @param Request $request
     * @return JsonResponse|null
     */
    public function datatables(Request $request)
    {
//        if($request->ajax()){
//            $data = PembelianRepository::getAllCurrentActiveCash();
//            return DataTables::of($data)->make(true);
//        }
//        return null;
        if($request->ajax()){
            $data = Pembelian::latest();
            return DataTables::of($data)->make(true);
        }
        return null;
    }

    public function destroy(Request $request)
    {
        //
    }
}
