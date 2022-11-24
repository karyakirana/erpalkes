<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\SalesArea;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AreaController extends Controller
{
    public function index()
    {
        return view('pages.master.area-index');
    }

    /**
     * @param Request $request
     * @return JsonResponse|null
     * @throws Exception
     */
    public function datatables(Request $request)
    {
        if ($request->ajax()){
            $data = SalesArea::latest()->get();
            return DataTables::of($data)
                ->make(true);
        }
        return null;
    }

    public function destroy(Request $request)
    {
        return SalesArea::destroy($request->id);
    }
}
