<?php

namespace App\Http\Controllers\Upload;


use App\Http\Controllers\Controller;
use App\Models\ProdukBrosur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GambarBrosurController extends Controller
{
    public function index()
    {
        return view('livewire.master.produk-form');
    }

    public function store(Request $request)
    {
        $produkBrosur = Session::get('folder');
        $namefile = Session::get('filename');

        $temporary = ProdukBrosur::where('folder', $produkBrosur)->where('image', $namefile)->first();

        if ($temporary) { //if exist

//            Image::create([
//                'folder' => $produkBrosur,
//                'image' => $namefile,
//            ]);

            //hapus file and folder temporary
            $path = storage_path() . '/app/files/gambar_brosur/' . $temporary->folder . '/' . $temporary->image;
            if (File::exists($path)) {

                Storage::move('files/gambar_brosur/'.$temporary->folder.'/'.$temporary->image, 'files/'.$temporary->folder.'/'.$temporary->image);

                File::delete($path);
                rmdir(storage_path('app/files/gambar_brosur/' . $temporary->folder));

                //delete record in temporary table
                $temporary->delete();

                return response()->json(['status' => true, 'message' => 'Data Success']);
            }

            return response()->json(['status' => true, 'message' => 'Data Gagal']);

        }

        return response()->json(['status' => false, 'message' => 'Data Gagal']);
    }
}
