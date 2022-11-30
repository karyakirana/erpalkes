<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use App\Models\ProdukBrosur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UploadGambarBrosurController extends Controller
{
    public function store(Request $request)
    {
        //process upload from filepond
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $folder = uniqid() . '-' . now()->timestamp;
        Session::put('folder', $folder); //save session  folder
        Session::put('filename', $filename); //save session filename
        $file->storeAs('files/gambar_brosur/' . $folder, $filename);

        ProdukBrosur::create([
            'folder' => $folder,
            'image' => $filename
        ]);

        return 'success';
    }


    public function destroy(ProdukBrosur $produkBrosur)
    {
        $produkBrosur = Session::get('folder');
        $namefile = Session::get('filename');

        $path = storage_path() . '/app/files/gambar_brosur/' . $produkBrosur . '/' . $namefile;
        if (File::exists($path)) {
            File::delete($path);
            rmdir(storage_path('app/files/gambar_brosur/' . $produkBrosur));

            //delete record in table temporaryImage
            ProdukBrosur::where([
                'folder' =>  $produkBrosur,
                'image' => $namefile
            ])->delete();

            return 'success';
        }

        else {
            return 'not found';
        }
    }
}
