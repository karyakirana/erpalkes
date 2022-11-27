<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;
use Response;

class AreaHelperController extends Controller
{
    public function province(Request $request)
    {
        if ($request->ajax()){
            $term = trim($request->search);
            $province = Province::where('name', 'like', '%'.$term.'%')->limit(10)->get();
            $formattedProvince = [];
            foreach ($province as $item) {
                $formattedProvince[] = ['id' => $item->id, 'text' => $item->name];
            }
            return Response::json($formattedProvince);
        }
        return null;
    }

    public function city(Request $request)
    {
        if ($request->ajax()){
            $term = trim($request->search);
            $city = Regency::where('province_id', $request->provinsi)
                ->where('name', 'like', '%'.$term.'%')
                ->limit(10)->get();
            $formattedCity = [];
            foreach ($city as $item){
                $formattedCity[] = ['id' => $item->id, 'text' => $item->name];
            }
            return Response::json($formattedCity);
        }
    }
}
