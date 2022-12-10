<?php namespace App\Http\Livewire\Master;

use App\Http\Requests\Master\PegawaiRequest;
use App\Mine\SubMaster\PegawaiRepository;

trait PegawaiFormTrait
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

    public function rules()
    {
        return (new PegawaiRequest())->rules();
    }

    public function messages()
    {
        return (new PegawaiRequest())->messages();
    }

    protected function loadFromData($pegawai_id)
    {
        $builder = PegawaiRepository::getById($pegawai_id);
        $this->kode = $builder->kode;
        $this->nama_pegawai = $builder->nama_pegawai;
        $this->gender = $builder->gender;
        $this->telepon = $builder->telepon;
        $this->email = $builder->email;
        $this->npwp = $builder->npwp;
        $this->jabatan_id = $builder->jabatan_id;
        $this->alamat = $builder->alamat;
        $this->regencies_id = $builder->regencies_id;
        $this->regencies_name = $builder->regency->name;
        $this->keterangan = $builder->keterangan;
    }
}
