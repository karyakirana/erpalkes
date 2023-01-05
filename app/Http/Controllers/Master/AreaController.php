<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
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
}
