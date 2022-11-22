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

    protected $listeners = [];

    public function resetForm()
    {
        $this->update = false;
        $this->reset([
            'jabatan_id', 'kode', 'nama_jabatan', 'keterangan'
        ]);
    }

    protected function kode()
    {
        return null;
    }

    public function store()
    {
        Jabatan::create([
            'kode' => $this->kode(),
            'nama_jabatan' => $this->nama_jabatan,
            'keterangan' => $this->keterangan
        ]);
    }

    public function edit($jabatanId)
    {
        $jabatan = Jabatan::find($jabatanId);
        $this->kode = $jabatan->kode;
        $this->nama_jabatan = $jabatan->nama_jabatan;
        $this->keterangan = $jabatan->keterangan;
    }

    public function update()
    {
        $jabatan = Jabatan::find($this->jabatan_id);
        $jabatan->update([
            'nama_jabatan' => $this->nama_jabatan,
            'keterangan' => $this->keterangan
        ]);
    }

    public function render()
    {
        return view('livewire.master.jabatan-form');
    }
}
