<?php

namespace App\Http\Livewire\Master;

use App\Mine\SubMaster\PegawaiRepository;
use App\Models\Master\Pegawai;
use Livewire\Component;

class PegawaiForm extends Component
{
    use PegawaiFormTrait;
    use CitySetTrait;

    public $update = false;

    protected $listeners = [
        'setCity'
    ];

    public function mount($pegawai_id = null)
    {
        if ($pegawai_id){
            $this->update = true;
            $this->loadFromData($pegawai_id);
        }
    }

    public function store()
    {
        $data = $this->validate();
        PegawaiRepository::store($data);
        // redirect
        session()->flash('message', 'Data '.$this->nama_pegawai.' sudah disimpan.');
        return redirect()->to(route('pegawai'));
    }

    public function update()
    {
        $data = $this->validate();
        PegawaiRepository::update($data, $this->pegawai_id);
        // redirect
        session()->flash('message', 'Data '.$this->nama_pegawai.' sudah diupdate.');
        return redirect()->to(route('pegawai'));
    }

    public function render()
    {
        return view('livewire.master.pegawai-form');
    }
}
