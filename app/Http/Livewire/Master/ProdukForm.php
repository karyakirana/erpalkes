<?php

namespace App\Http\Livewire\Master;

use App\Mine\SubMaster\ProdukRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class ProdukForm extends Component
{
    use ProdukFormTrait;

    public $update = false;

    protected $listeners = [
        'selectedKategoriId',
        'selectedSubKategoriId'
    ];

    public function mount($produk_id = null)
    {
        if ($produk_id){
            $this->update = true;
            $this->loadProduk($produk_id);
        } else {
            $this->dataKemasan = [
                [
                    'kemasan' => '',
                    'isi' => ''
                ]
            ];
        }
    }

    public function selectedKategoriId($kategori_id)
    {
        $this->produk_kategori_id = $kategori_id;
    }

    public function selectedSubKategoriId($sub_kategori_id)
    {
        // dd($sub_kategori_id);
        $this->produk_sub_kategori_id = $sub_kategori_id;
    }

    public function updatedDataHargaPersenDiskon($value)
    {
        $this->dataHarga['harga_diskon'] = (int) $this->harga * (int) $value / 100;
    }

    public function updatedDataHargaHargaDiskon($value)
    {
        $this->dataHarga['persen_diskon'] = (int) $value / (int) $this->harga * 100;
    }

    public function addKemasan()
    {
        $this->dataKemasan[] = [
            'kemasan' => '',
            'isi' => ''
        ];
    }

    public function removeKemasan($index)
    {
        unset($this->dataKemasan[$index]);
        $this->dataKemasan = array_values($this->dataKemasan);
    }

    public function store()
    {
        \DB::beginTransaction();
        try {
            $data = $this->validate();
            //dd($data);
            $produk = ProdukRepository::store($data);
            // redirect
            \DB::commit();
            session()->flash('message', 'Data '.$this->nama_produk.' sudah disimpan.');
            return redirect()->to(route('produk'));
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
            session()->flash('message', $e);
        }
    }

    public function update()
    {
        \DB::beginTransaction();
        try {
            $data = $this->validate();
            $produk = ProdukRepository::update($data, $this->produk_id);
            \DB::commit();
            // redirect
            session()->flash('message', 'Data '.$this->nama_produk.' sudah diperbarui.');
            return redirect()->to(route('produk'));
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
            session()->flash('message', $e);
        }

    }

    public function render()
    {
        return view('livewire.master.produk-form');
    }
}
