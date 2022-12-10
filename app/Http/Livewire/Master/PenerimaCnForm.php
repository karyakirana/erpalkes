<?php

namespace App\Http\Livewire\Master;

use App\Mine\SubMaster\PenerimaCnRepository;
use Livewire\Component;

class PenerimaCnForm extends Component
{
    use PenerimaCnFormTrait, CustomerSetTrait;

    public $update = false;

    protected $listeners = [
        'setCustomer'
    ];

    public function mount($penerimacn_id = null)
    {
        if ($penerimacn_id){
            $this->update = true;
            $this->loadData($penerimacn_id);
        }
    }

    public function store()
    {
        $data = $this->validate();
        $penerimaCn = PenerimaCnRepository::store($data);
        // redirect
        return redirect()->route('penerima-cn');
    }

    public function update()
    {
        $data = $this->validate();
        $penerimaCn = PenerimaCnRepository::update($data, $this->penerimacn_id);
        // redirect
        return redirect()->route('penerima-cn');
    }

    public function render()
    {
        return view('livewire.master.penerima-cn-form');
    }
}
