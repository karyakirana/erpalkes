<?php

namespace App\Http\Livewire\Master;

use App\Models\Master\Jabatan;
use Livewire\Component;

class JabatanForm extends Component
{
    public $jabatan_id;
    public $kode;
    public $nama;
    public $keterangan;

    public $update = false;

    protected $listeners = [
        'resetForm',
        'edit',
        'destroy'
    ];

    protected $rules = [
        'nama'=> 'required|min:3'
    ];

    public function resetForm()
    {
        $this->update = false;
        $this->reset([
            'jabatan_id', 'kode', 'nama', 'keterangan'
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    protected function kode()
    {
        $jabatan = Jabatan::latest('kode')->first();
        if (!$jabatan){
            $num = 1;
        } else {
            $lastNum = (int) $jabatan->last_num_master;
            $num = $lastNum + 1;
        }
        return "J".sprintf("%05s", $num);
    }

    public function store()
    {
        $this->validate();
        Jabatan::create([
            'kode' => $this->kode(),
            'nama' => $this->nama,
            'keterangan' => $this->keterangan
        ]);
        $this->emit('modalJabatanHide');
        $this->emit('refreshDatatable');
    }

    public function edit($jabatanId)
    {
        $jabatan = Jabatan::find($jabatanId);
        $this->update = true;
        $this->jabatan_id = $jabatan->id;
        $this->kode = $jabatan->kode;
        $this->nama = $jabatan->nama;
        $this->keterangan = $jabatan->keterangan;
        $this->emit('modalJabatanShow');
    }

    public function update()
    {
        $this->validate();
        $jabatan = Jabatan::find($this->jabatan_id);
        $jabatan->update([
            'nama_jabatan' => $this->nama,
            'keterangan' => $this->keterangan
        ]);
        $this->emit('modalJabatanHide');
        $this->emit('refreshDatatable');
    }

    public function destroy($id)
    {
        Jabatan::destroy($id);
        $this->emit('refreshDatatable');
    }

    public function render()
    {
        return view('livewire.master.jabatan-form');
    }
}
