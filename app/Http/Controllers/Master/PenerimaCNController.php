<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\master\PenerimaCN;
use Illuminate\Http\Request;

class PenerimaCNController extends Controller
{
    public function index()
    {
        return view('pages.master.penerima-cn-index');
    }

    public function datatables(Request $request)
    {
        if ($request->ajax()){
            $builder = PenerimaCN::latest()->get();
            return \DataTables::of($builder)->make(true);
        }
    }

    public function destroy(Request $request)
    {
        return PenerimaCN::destroy($request->id);
    }
}
