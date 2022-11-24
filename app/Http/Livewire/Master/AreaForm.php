<?php

namespace App\Http\Livewire\Master;

use App\Models\Master\SalesArea;
use Livewire\Component;

class AreaForm extends Component
{
    public $area_id;
    public $kode_area;
    public $nama_area;
    public $keterangan;

    public $update = false;

    protected $listeners = [
        'store',
        'edit',
        'update',
        'resetForm'
    ];

    protected $rules = [
        'nama_area' => 'required|min:3',
    ];

    public function resetForm()
    {
        $this->update = false;
        $this->reset(['area_id', 'kode_area', 'nama_area', 'keterangan']);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function edit($area_id)
    {
        $this->update = true;
        $area = SalesArea::find($area_id);
        $this->area_id = $area->id;
        $this->kode_area = $area->kode_area;
        $this->nama_area = $area->nama_area;
        $this->keterangan = $area->keterangan;
        $this->emit('modalAreaShow');
    }

    protected function kode()
    {
        $area = SalesArea::latest('kode_area')->first();
        if ($area == null){
            $num = 1;
        } else {
            $lastNum = (int) $area->last_num_master;
            $num = $lastNum + 1;
        }
        return "A".sprintf("%05s", $num);
    }

    public function store()
    {
        $this->validate();
        SalesArea::create([
            'kode_area' => $this->kode(),
            'nama_area' => $this->nama_area,
            'keterangan' => $this->keterangan
        ]);
        $this->emit('modalAreaHide');
    }

    public function update()
    {
        $this->validate();
        $area = SalesArea::find($this->area_id);
        $area->update([
            'nama_area' => $this->nama_area,
            'keterangan' => $this->keterangan
        ]);
        $this->emit('modalAreaHide');
    }

    public function render()
    {
        return view('livewire.master.area-form');
    }
}
