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

    public function show($penerima_cn_id)
    {
        return view('');
    }
}
