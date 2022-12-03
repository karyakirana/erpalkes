<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockAwalController extends Controller
{
    public function index()
    {
        return view('pages.stock.stock-awal-index');
    }

    public function datatables(Request $request)
    {
        if ($request->ajax()){
            //
        }
    }

    public function destroy(Request $request)
    {
        //
    }
}
