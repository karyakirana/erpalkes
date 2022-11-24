<?php

namespace App\Http\Controllers;

use App\Models\Master\ProdukKategori;
use DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProdukKategoriController extends Controller
{
    public function index()
    {
        return view('pages.master.produk-kategori-index');
    }

    /**
     * @param Request $request
     * @return JsonResponse
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
