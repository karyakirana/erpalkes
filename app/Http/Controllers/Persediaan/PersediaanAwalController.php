<?php

namespace App\Http\Controllers\Persediaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersediaanAwalController extends Controller
{
    public function index()
    {
        return view('pages.persediaan.persediaan-awal-index');
    }
}
