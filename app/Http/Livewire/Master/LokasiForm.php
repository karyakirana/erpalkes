<?php

namespace App\Http\Livewire\Master;

use App\Models\Master\Lokasi;
use Livewire\Component;

class LokasiForm extends Component
{
    public $lokasi_id;
    public $lokasi;
    public $keterangan;

    public $update = false;

    protected $listeners = [
        'resetForm',
        'edit',
        'destroy'
    ];

    public function mount($lokasi_id = null)
    {
        //
    }

    public function resetForm()
    {
        $this->reset([
            'lokasi_id', 'lokasi', 'keterangan'
        ]);
    }

    protected function kode()
    {
        // generate kode
        $builder = Lokasi::latest('kode')->first();
        if (!$builder){
            $num = 1;
        } else {
            $lastNum = (int) $builder->last_num_master;
            $num = $lastNum + 1;
        }
        return "L".sprintf("%05s", $num);
    }

    public function store()
    {
        $data = $this->validate([
            'lokasi_id' => ($this->update) ? 'required' : 'nullable',
            'lokasi' => 'required|min:3',
            'keterangan' => 'nullable'
        ]);
        if (!$this->update){
            $data['kode'] = $this->kode();
            Lokasi::create($data);
        }
        if ($this->update){
            Lokasi::find($this->lokasi_id)->update($data);
        }
        $this->emit('modalLokasiHide');
        $this->emit('refreshDatatable');
    }

    public function edit($lokasi_id)
    {
        $this->update = true;
        $lokasi = Lokasi::find($lokasi_id);
        $this->lokasi_id = $lokasi->id;
        $this->lokasi = $lokasi->lokasi;
        $this->keterangan = $lokasi->keterangan;
        $this->emit('modalLokasiShow');
    }

    public function destroy($lokasi_id)
    {
        Lokasi::destroy($lokasi_id);
        $this->emit('refreshDatatable');
    }

    public function render()
    {
        return view('livewire.master.lokasi-form');
    }
}
