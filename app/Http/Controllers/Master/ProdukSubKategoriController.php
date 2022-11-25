<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\ProdukSubKategori;
use DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProdukSubKategoriController extends Controller
{
    public function index()
    {
        return view('pages.master.produk-sub-kategori-index');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function datatables(Request $request)
    {
        $builder = ProdukSubKategori::latest()->get();
        return DataTables::of($builder)->make(true);
    }

    public function destroy(Request $request)
    {
        return ProdukSubKategori::destroy($request->id);
    }
}
