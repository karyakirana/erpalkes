<?php

namespace App\Http\Livewire\Master;

use App\Mine\SubMaster\PegawaiRepository;
use Livewire\Component;

class PegawaiDetailSidebar extends Component
{
    use PegawaiFormTrait;
    use CitySetTrait;

    protected $listeners = [
        'setCity'
    ];

    public function mount($pegawai_id)
    {
        $this->loadFromData($pegawai_id);
    }

    public function update()
    {
        $data = $this->validate();
        PegawaiRepository::update($data, $this->pegawai_id);
        $this->emit('modalPegawaiHide');
    }

    public function render()
    {
        return view('livewire.master.pegawai-detail-sidebar');
    }
}
