<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Mine\SubMaster\SalesAreaRepository;
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
            $data = SalesAreaRepository::getAll();
            return DataTables::of($data)
                ->make(true);
        }
        return null;
    }

    public function destroy(Request $request)
    {
        return SalesAreaRepository::destroy($request->id);
    }
}
