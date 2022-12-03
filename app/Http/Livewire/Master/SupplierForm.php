<?php

namespace App\Http\Livewire\Master;

use App\Models\Master\Supplier;
use App\Models\Regency;
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
    public $regencies_id, $regencies_name;
    public $provinces_id, $provinces_name;
    public $keterangan;

    public $update = false;

    protected $listeners = [
        'setCity'
    ];

    protected $rules = [
        'nama_supplier'=>'required|min:3',
        'alamat'=>'required|min:3',
    ];

    protected $messages = [
        'regencies_id.required' => 'Data Kota harus diinput'
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

    public function setCity(Regency $regency)
    {
        $this->regencies_id = $regency->id;
        $this->regencies_name = $regency->name;
        $this->emit('modalCityHide');
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

    protected function setData()
    {
        return $this->validate([
            'kode' => 'required',
            'nama_supplier' => 'required|min:3',
            'telepon' => 'nullable',
            'email' => 'nullable|email',
            'npwp' => 'nullable|min:10',
            'alamat' => 'required|min:10',
            'regencies_id' => 'required',
            'keterangan' => 'nullable'
        ]);
    }

    public function store()
    {
        $data = $this->setData();
        $supplier = Supplier::create($data);
        // redirect
        session()->flash('message', 'Data '.$this->nama_supplier.' sudah disimpan.');
        return redirect()->to(route('supplier'));
    }

    public function update()
    {
        $data = $this->setData();
        unset($data['kode']);
        $supplier = Supplier::find($this->supplier_id);
        $supplier->update($data);
        // redirect
        session()->flash('message', 'Data '.$this->nama_supplier.' sudah diperbarui.');
        return redirect()->to(route('supplier'));
    }

    public function render()
    {
        return view('livewire.master.supplier-form');
    }
}
