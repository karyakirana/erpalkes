<?php namespace App\Http\Livewire\Master;

use App\Http\Requests\Master\SupplierRequest;
use App\Mine\SubMaster\SupplierRepository;

trait SupplierFormTrait
{
    public $supplier_id;
    public $kode;
    public $status = 'active';
    public $nama;
    public $telepon;
    public $email;
    public $npwp;
    public $alamat;
    public $regencies_id, $regencies_name;
    public $keterangan;

    public function rules()
    {
        return (new SupplierRequest())->rules();
    }

    public function messages()
    {
        return (new SupplierRequest())->messages();
    }

    protected function loadSupplier($supplier_id)
    {
        $supplier = SupplierRepository::getById($supplier_id);
        $this->supplier_id = $supplier->id;
        $this->kode = $supplier->kode;
        $this->nama = $supplier->nama;
        $this->telepon = $supplier->telepon;
        $this->email = $supplier->email;
        $this->npwp = $supplier->npwp;
        $this->alamat = $supplier->alamat;
        $this->regencies_id = $supplier->regencies_id;
        $this->regencies_name = $supplier->regency->name;
        $this->keterangan = $supplier->keterangan;
    }
}
