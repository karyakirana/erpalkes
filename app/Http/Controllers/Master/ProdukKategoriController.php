<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\ProdukKategori;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProdukKategoriController extends Controller
{
    public function index()
    {
        return view('pages.master.produk-kategori-index');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function datatables(Request $request)
    {
        $data = ProdukKategori::latest()->get();
        return DataTables::of($data)->make(true);
    }

    public function destroy(Request $request)
    {
        return ProdukKategori::destroy($request->id);
    }
}
