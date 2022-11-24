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

    protected $rules = [
        'nama_supplier'=>'required|min:3',
        'alamat'=>'required|min:3',
    ];

    public function mount($supplier_id = null)
    {
        if ($supplier_id){
            $this->update = true;
            $supplier = Supplier::find($supplier_id);
            $this->supplier_id = $supplier->id;
            $this->kode = $supplier->kode;
            $this->nama_supplier = $supplier->nama_supplier;
            $this->telepon = $supplier->telepon;
            $this->email = $supplier->email;
            $this->npwp = $supplier->npwp;
            $this->alamat = $supplier->alamat;
            $this->keterangan = $supplier->keterangan;
        }
    }

    protected function kode()
    {
        $supplier = Supplier::latest('kode')->first();
        if (!$supplier){
            $num = 1;
        } else {
            $lastNum = (int) $supplier->last_num_master;
            $num = $lastNum + 1;
        }
        return "S".sprintf("%05s", $num);
    }

    public function store()
    {
        $this->validate();
        $supplier = Supplier::create([
            'kode' => $this->kode(),
            'nama_supplier' => $this->nama_supplier,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'npwp' => $this->npwp,
            'alamat' => $this->alamat,
            'keterangan' => $this->keterangan
        ]);
        // redirect
        session()->flash('message', 'Data '.$this->nama_supplier.' sudah disimpan.');
        return redirect()->to(route('supplier'));
    }

    public function update()
    {
        $this->validate();
        $supplier = Supplier::find($this->supplier_id);
        $supplier->update([
            'nama_supplier' => $this->nama_supplier,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'npwp' => $this->npwp,
            'alamat' => $this->alamat,
            'keterangan' => $this->keterangan
        ]);
        // redirect
        session()->flash('message', 'Data '.$this->nama_supplier.' sudah diperbarui.');
        return redirect()->to(route('supplier'));
    }

    public function render()
    {
        return view('livewire.master.supplier-form');
    }
}
