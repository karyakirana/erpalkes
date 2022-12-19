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

    protected $listeners = [
        'resetForm',
        'edit',
        'destroy'
    ];

    public function rules()
    {
        return (new GudangRequest())->rules();
    }

    public function resetForm()
    {
        $this->reset(['gudang_id', 'nama', 'keterangan']);
        $this->update = false;
        $this->emit('refreshDatatable');
    }
    public function store()
    {
        $data = $this->validate();
        GudangRepository::store($data);
        $this->emit('formGudangHide');
    }

    public function edit($id)
    {
        $data = GudangRepository::getById($id);
        $this->update = true;
        $this->gudang_id = $data->id;
        $this->nama = $data->nama;
        $this->keterangan = $data->keterangan;
        $this->emit('formGudangShow');
    }

    public function update()
    {
        $data = $this->validate();
        GudangRepository::update($data, $this->gudang_id);
        $this->emit('formGudangHide');
    }

    public function destroy($id)
    {
        GudangRepository::destroy($id);
        $this->emit('refreshDatatable');
    }

    public function render()
    {
        return view('livewire.master.gudang-form');
    }
}
