<?php

namespace App\Http\Livewire\Master;

use App\Mine\SubMaster\PegawaiRepository;
use App\Models\Master\Jabatan;
use App\Models\Master\Pegawai;
use Livewire\Component;

class PegawaiForm extends Component
{
    use PegawaiFormTrait;
    use CitySetTrait;

    public $update = false;

    protected $listeners = [
        'setCity'
    ];

    public function mount($pegawai_id = null)
    {
        if ($pegawai_id){
            $this->update = true;
            $this->loadFromData($pegawai_id);
        }
    }

    public function store()
    {
        $data = $this->validate();
        PegawaiRepository::store($data);
        // redirect
        session()->flash('message', 'Data '.$this->nama.' sudah disimpan.');
        return redirect()->to(route('pegawai'));
    }

    public function update()
    {
        $data = $this->validate();
        PegawaiRepository::update($data, $this->pegawai_id);
        // redirect
        session()->flash('message', 'Data '.$this->nama.' sudah diupdate.');
        return redirect()->to(route('pegawai'));
    }

    public $add_nama_jabatan, $add_keterangan_jabatan;

    protected function kodeJabatan()
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

    public function addJabatan()
    {
        $data = $this->validate([
            'add_nama_jabatan' => 'required',
            'add_keterangan_jabatan' => 'nullable'
        ]);
        Jabatan::create([
            'kode' => $this->kodeJabatan(),
            'nama' => $this->add_nama_jabatan,
            'keterangan' => $this->add_keterangan_jabatan
        ]);
        $this->reset(['add_nama_jabatan', 'add_keterangan_jabatan']);
    }

    public function render()
    {
        return view('livewire.master.pegawai-form');
    }
}
