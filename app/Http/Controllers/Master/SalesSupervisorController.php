<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesSupervisorController extends Controller
{
    public function index()
    {
        return view('pages.master.sales-supervisor-index');
    }

    public function show($sales_supervisor_id)
    {
        return view('pages.master.sales-supervisor-show', ['sales_supervisor_id' => $sales_supervisor_id]);
    }
}
