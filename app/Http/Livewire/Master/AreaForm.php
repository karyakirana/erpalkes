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

    public function resetForm()
    {
        $this->update = false;
        $this->reset(['area_id', 'kode_area', 'nama_area', 'keterangan']);
    }

    public function edit($area_id)
    {
        $this->update = true;
        $area = SalesArea::find($area_id);
        $this->area_id = $area->id;
        $this->kode_area = $area->kode_area;
        $this->nama_area = $area->nama_area;
        $this->keterangan = $area->keterangan;
    }

    protected function kode()
    {
        return null;
    }

    public function store()
    {
        SalesArea::create([
            'kode_area' => $this->kode(),
            'nama_area' => $this->nama_area,
            'keterangan' => $this->keterangan
        ]);
    }

    public function update()
    {
        $area = SalesArea::find($this->area_id);
        $area->update([
            'nama_area' => $this->nama_area,
            'keterangan' => $this->keterangan
        ]);
    }

    public function render()
    {
        return view('livewire.master.area-form');
    }
}
