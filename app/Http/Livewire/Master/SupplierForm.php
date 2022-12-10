<?php

namespace App\Http\Livewire\Master;

use App\Mine\SubMaster\SupplierRepository;
use Livewire\Component;

class SupplierForm extends Component
{
    use SupplierFormTrait;
    use CitySetTrait;

    public $update = false;

    protected $listeners = [
        'setCity'
    ];

    public function mount($supplier_id = null)
    {
        if ($supplier_id){
            $this->update = true;
            $this->loadSupplier($supplier_id);
        }
    }

    protected function setData()
    {
        return $this->validate();
    }

    public function store()
    {
        $data = $this->setData();
        //dd($data);
        SupplierRepository::store($data);
        // redirect
        session()->flash('message', 'Data '.$this->nama_supplier.' sudah disimpan.');
        return redirect()->to(route('supplier'));
    }

    public function update()
    {
        $data = $this->setData();
        SupplierRepository::update($data, $this->supplier_id);
        // redirect
        session()->flash('message', 'Data '.$this->nama_supplier.' sudah diperbarui.');
        return redirect()->to(route('supplier'));
    }

    public function render()
    {
        return view('livewire.master.supplier-form');
    }
}
