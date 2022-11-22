<?php

namespace App\Http\Livewire\Master;

use App\Models\Master\Supplier;
use Livewire\Component;

class SupplierForm extends Component
{
    public $supplier_id;
    public $kode;
    public $nama_supplier;
    public $telepon;
    public $email;
    public $npwp;
    public $alamat;
    public $keterangan;

    public $update = false;

    protected $listeners = [];

    protected function kode()
    {
        return null;
    }

    public function resetForm()
    {
        //
    }

    public function store()
    {
        $supplier = Supplier::create([
            'kode' => $this->kode(),
            'nama_supplier' => $this->nama_supplier,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'npwp' => $this->npwp,
            'alamat' => $this->alamat,
            'keterangan' => $this->keterangan
        ]);
    }

    public function update()
    {
        $supplier = Supplier::find($this->supplier_id);
        $supplier->update([
            'nama_supplier' => $this->nama_supplier,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'npwp' => $this->npwp,
            'alamat' => $this->alamat,
            'keterangan' => $this->keterangan
        ]);
    }

    public function render()
    {
        return view('livewire.master.supplier-form');
    }
}
