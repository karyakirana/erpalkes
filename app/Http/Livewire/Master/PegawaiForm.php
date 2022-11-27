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
    public $jabatan_id, $jabatan_nama;
    public $alamat;
    public $keterangan;

    public $update = false;

    protected $listeners = [];

    protected $rules = [
        'nama_pegawai'=>'required|min:3',
        'gender'=>'required',
        'telepon'=>'required',
        'alamat'=>'required'
    ];

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
            $this->alamat = $pegawai->alamat;
            $this->keterangan = $pegawai->keterangan;
        }
    }

    protected function kode()
    {
        $pegawai = Pegawai::latest('kode')->first();
        if (!$pegawai){
            $num = 1;
        } else {
            $lastNum = (int) $pegawai->last_num_master;
            $num = $lastNum + 1;
        }
        return "E".sprintf("%05s", $num);
    }

    public function store()
    {
        $this->validate();
        Pegawai::create([
            'kode' => $this->kode(),
            'nama_pegawai' => $this->nama_pegawai,
            'gender' => $this->gender,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'npwp'=>$this->npwp,
            'jabatan_id' => $this->jabatan_id,
            'alamat' => $this->alamat,
            'keterangan' => $this->keterangan,
        ]);
        // redirect
        session()->flash('message', 'Data '.$this->nama_pegawai.' sudah disimpan.');
        return redirect()->to(route('pegawai'));
    }

    public function update()
    {
        $this->validate();
        $pegawai = Pegawai::find($this->pegawai_id);
        $pegawai->update([
            'nama_pegawai' => $this->nama_pegawai,
            'gender' => $this->gender,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'npwp'=>$this->npwp,
            'jabatan_id' => $this->jabatan_id,
            'alamat' => $this->alamat,
            'keterangan' => $this->keterangan,
        ]);
        // redirect
        session()->flash('message', 'Data '.$this->nama_pegawai.' sudah diupdate.');
        return redirect()->to(route('pegawai'));
    }

    public function render()
    {
        return view('livewire.master.pegawai-form');
    }
}
