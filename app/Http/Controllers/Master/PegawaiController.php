<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Pegawai;
use DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('pages.master.pegawai-index');
    }

    public function show($pegawai_id)
    {
        return view('pages.master.pegawai-show', ['pegawai_id', $pegawai_id]);
    }

    /**
     * @param Request $request
     * @return JsonResponse|null
     */
    public function datatables(Request $request)
    {
        if ($request->ajax()){
            $data = Pegawai::with('jabatan')
                ->latest()->get();
            return DataTables::of($data)
                ->make(true);
        }
        return null;
    }

    public function destroy(Request $request)
    {
        return Pegawai::destroy($request->id);
    }
}
