<?php

namespace App\Http\Livewire\Master;

use App\Http\Requests\Master\GudangRequest;
use App\Mine\SubMaster\GudangRepository;
use Livewire\Component;

class GudangForm extends Component
{
    public $gudang_id;
    public $nama;
    public $keterangan;

    public $update = false;

    public function rules()
    {
        return (new GudangRequest())->rules();
    }
    public function store()
    {
        $data = $this->validate();
        GudangRepository::store($data);
    }

    public function update()
    {
        $data = $this->validate();
        GudangRepository::update($data, $this->gudang_id);
    }
    public function render()
    {
        return view('livewire.master.gudang-form');
    }
}
