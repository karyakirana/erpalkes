<?php

namespace App\Http\Livewire\Master;

use App\Models\Master\Jabatan;
use Livewire\Component;

class JabatanForm extends Component
{
    public $jabatan_id;
    public $kode;
    public $nama_jabatan;
    public $keterangan;

    public $update = false;

    protected $listeners = [
        'resetForm',
        'edit'
    ];

    protected $rules = [
        'nama_jabatan'=> 'required|min:3'
    ];

    public function resetForm()
    {
        $this->update = false;
        $this->reset([
            'jabatan_id', 'kode', 'nama_jabatan', 'keterangan'
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
            'nama_jabatan' => $this->nama_jabatan,
            'keterangan' => $this->keterangan
        ]);
        $this->emit('modalJabatanHide');
    }

    public function edit($jabatanId)
    {
        $jabatan = Jabatan::find($jabatanId);
        $this->update = true;
        $this->jabatan_id = $jabatan->id;
        $this->kode = $jabatan->kode;
        $this->nama_jabatan = $jabatan->nama_jabatan;
        $this->keterangan = $jabatan->keterangan;
        $this->emit('modalJabatanShow');
    }

    public function update()
    {
        $this->validate();
        $jabatan = Jabatan::find($this->jabatan_id);
        $jabatan->update([
            'nama_jabatan' => $this->nama_jabatan,
            'keterangan' => $this->keterangan
        ]);
        $this->emit('modalJabatanHide');
    }

    public function render()
    {
        return view('livewire.master.jabatan-form');
    }
}
