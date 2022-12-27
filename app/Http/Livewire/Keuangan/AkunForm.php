<?php

namespace App\Http\Livewire\Keuangan;

use App\Models\Akuntansi\Akun;
use Livewire\Component;

class AkunForm extends Component
{
    protected $listeners = [
        'setAkunKategoriId',
        'setAkunTipeId'
    ];

    public $akun_id;
    public $akun_kategori_id;
    public $akun_tipe_id;
    public $kode;
    public $nama;
    public $keterangan;

    public $update = false;

    public function mount($akun_Id = null)
    {
        if ($akun_Id){
            $this->update = true;
        }
    }

    public function rules()
    {
        return [
            'akun_id' => 'nullable',
            'akun_tipe_id' => 'required',
            'akun_kategori_id' => 'required',
            'kode' => ($this->update) ? 'required' : 'nullable',
            'nama' => 'required',
            'keterangan' => 'nullable'
        ];
    }

    /**
     * @param $akun_kategori_id
     */
    public function setAkunKategoriId($akun_kategori_id): void
    {
        $this->akun_kategori_id = $akun_kategori_id;
    }

    /**
     * @param $akun_tipe_id
     */
    public function setAkunTipeId($akun_tipe_id): void
    {
        $this->akun_tipe_id = $akun_tipe_id;
    }

    public function store()
    {
        $data = $this->validate();
        Akun::create($data);
        return redirect()->route('keuangan.akun');
    }

    public function update()
    {
        $data = $this->validate();
        Akun::find($this->akun_id)->update($data);
        return redirect()->route('keuangan.akun');
    }


    public function render()
    {
        return view('livewire.keuangan.akun-form');
    }
}
