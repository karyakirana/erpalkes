<?php

namespace App\Http\Livewire\Master;

use App\Models\Master\Produk;
use Livewire\Component;

class ProdukForm extends Component
{
    public $produk_kategori_id;
    public $kode;
    public $nama_produk;
    public $tipe;
    public $isi_kemasan;
    public $satuan_beli;
    public $satuan_jual;
    public $produk_image_id;
    public $produk_brosur_id;
    public $harga;
    public $keterangan;

    public $update = false;

    protected $listeners = [];

    protected $rules = [
        'nama_produk'=>'required|min:3',
        'tipe'=>'required|min:3',
    ];

    public function mount($produk_id = null)
    {
        if ($produk_id){
            $this->update = true;
            $produk = Produk::find($produk_id);
            $this->produk_kategori_id = $produk->id;
            $this->kode = $produk->kode;
            $this->nama_produk = $produk->nama_produk;
            $this->tipe = $produk->tipe;
            $this->isi_kemasan = $produk->isi_kemasan;
            $this->satuan_beli = $produk->satuan_beli;
            $this->satuan_jual = $produk->satuan_jual;
            $this->produk_image_id = $produk->produk_image_id;
            $this->produk_brosur_id = $produk->produk_brosur_id;
            $this->harga = $produk->harga;
            $this->keterangan = $produk->keterangan;

        }
    }

    protected function kode()
    {
        $produk = Produk::latest('kode')->first();
        if (!$produk){
            $num = 1;
        } else {
            $lastNum = (int) $produk->last_num_master;
            $num = $lastNum + 1;
        }
        return "S".sprintf("%05s", $num);
    }

    public function store()
    {
        $this->validate();
        $produk = Produk::create([
            'kode' => $this->kode(),
            'produk_kategori_id' => $this->produk_kategori_id,
            'nama_produk' => $this->nama_produk,
            'tipe' => $this->tipe,
            'satuan_beli' => $this->satuan_beli,
            'satuan_jual' => $this->satuan_jual,
            'produk_image_id' => $this->produk_image_id,
            'produk_brosur_id' => $this->produk_brosur_id,
            'harga' => $this->harga,
            'keterangan' => $this->keterangan
        ]);
        // redirect
        session()->flash('message', 'Data '.$this->nama_produk.' sudah disimpan.');
        return redirect()->to(route('produk'));
    }

    public function update()
    {
        $this->validate();
        $produk = Produk::find($this->produk_id);
        $produk->update([
            'produk_kategori_id' => $this->produk_kategori_id,
            'nama_produk' => $this->nama_produk,
            'tipe' => $this->tipe,
            'satuan_beli' => $this->satuan_beli,
            'satuan_jual' => $this->satuan_jual,
            'produk_image_id' => $this->produk_image_id,
            'produk_brosur_id' => $this->produk_brosur_id,
            'harga' => $this->harga,
            'keterangan' => $this->keterangan
        ]);
        // redirect
        session()->flash('message', 'Data '.$this->nama_produk.' sudah diperbarui.');
        return redirect()->to(route('produk'));
    }

    public function render()
    {
        return view('livewire.master.produk-form');
    }
}
