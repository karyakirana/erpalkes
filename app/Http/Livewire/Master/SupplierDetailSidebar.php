<?php

namespace App\Http\Livewire\Master;

use App\Mine\SubMaster\SupplierRepository;
use Livewire\Component;

class SupplierDetailSidebar extends Component
{
    use SupplierFormTrait;
    use CitySetTrait;

    protected $listeners = [
        'setCity'
    ];

    public function mount($supplier_id)
    {
        $this->loadSupplier($supplier_id);
    }

    public function update()
    {
        $data = $this->validate();
        $supplier = SupplierRepository::getById($this->supplier_id);
        $supplier->update($data);
        $this->emit('modalSupplierDetailHide');
    }

    public function render()
    {
        return view('livewire.master.supplier-detail-sidebar');
    }
}
