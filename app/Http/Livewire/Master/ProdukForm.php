<?php

namespace App\Http\Livewire\Master;

use App\Models\Master\Produk;
use Livewire\Component;

class ProdukForm extends Component
{
    public $produk_id;
    public $produk_kategori_id;
    public $kode;
    public $is_expired;
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
            $this->produk_kategori_id = $produk->produk_kategori_id;
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
        return "P".sprintf("%05s", $num);
    }

    public function setData()
    {
        $this->kode = $this->kode();
        return $this->validate([
            'produk_id' => ($this->update) ? 'required' : 'nullable',
            'produk_kategori_id' => 'required',
            'kode' => 'required',
            'nama_produk' => 'required',
            'is_expired' => 'nullable',
            'tipe' => 'required',
            'satuan_beli' => 'required',
            'isi_kemasan' => 'required',
            'satuan_jual' => 'required',
            'harga' => 'required',
            'keterangan' => 'nullable'
        ]);
    }

    public function store()
    {
        $data = $this->setData();
        //dd($data);
        $produk = Produk::create($data);
        // redirect
        session()->flash('message', 'Data '.$this->nama_produk.' sudah disimpan.');
        return redirect()->to(route('produk'));
    }

    public function update()
    {
        $data = $this->setData();
        unset($data['kode']);
        $produk = Produk::find($this->produk_id);
        $produk->update($data);
        // redirect
        session()->flash('message', 'Data '.$this->nama_produk.' sudah diperbarui.');
        return redirect()->to(route('produk'));
    }

    public function render()
    {
        return view('livewire.master.produk-form');
    }
}
