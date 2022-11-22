<?php

namespace App\Http\Livewire\Master;

use App\Models\Master\Pegawai;
use Livewire\Component;

class PegawaiForm extends Component
{
    public $pegawai_id;
    public $kode;
    public $nama_pegawai;
    public $gender;
    public $telepon;
    public $email;
    public $npwp;
    public $jabatan_id;
    public $keterangan;

    public $update = false;

    protected $listeners = [];

    public function mount($pegawai_id = null)
    {
        if ($pegawai_id){
            $this->update = true;
            $pegawai = Pegawai::find($pegawai_id);
            $this->kode = $pegawai->kode;
            $this->nama_pegawai = $pegawai->nama_pegawai;
            $this->gender = $pegawai->gender;
            $this->telepon = $pegawai->telepon;
            $this->email = $pegawai->email;
            $this->npwp = $pegawai->npwp;
            $this->jabatan_id = $pegawai->jabatan_id;
            $this->keterangan = $pegawai->keterangan;
        }
    }

    protected function kode()
    {
        return null;
    }

    public function store()
    {
        Pegawai::create([
            'kode' => $this->kode(),
            'nama_pegawai' => $this->nama_pegawai,
            'gender' => $this->gender,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'npwp'=>$this->npwp,
            'jabatan_id' => $this->jabatan_id,
            'keterangan' => $this->keterangan
        ]);
        // redirect
    }

    public function update()
    {
        $pegawai = Pegawai::find($this->pegawai_id);
        $pegawai->update([
            'nama_pegawai' => $this->nama_pegawai,
            'gender' => $this->gender,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'npwp'=>$this->npwp,
            'jabatan_id' => $this->jabatan_id,
            'keterangan' => $this->keterangan
        ]);
        // redirect
    }

    public function render()
    {
        return view('livewire.master.pegawai-form');
    }
}
