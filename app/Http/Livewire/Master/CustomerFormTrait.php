<?php namespace App\Http\Livewire\Master;

use App\Http\Requests\Master\CustomerRequest;
use App\Mine\SubMaster\CustomerRepository;

trait CustomerFormTrait
{
    public $customer_id;
    public $kode;
    public $jenis_instansi;
    public $area_id, $nama_area;
    public $nama_customer;
    public $telepon;
    public $email;
    public $npwp;
    public $alamat;
    public $regencies_id, $regencies_name;
    public $diskon;
    public $keterangan;

    public function rules()
    {
        return (new CustomerRequest())->rules();
    }

    public function messages()
    {
        return (new CustomerRequest())->messages();
    }

    protected function loadCustomer($customer_id)
    {
        $customer = CustomerRepository::getById($customer_id);
        $this->kode = $customer->kode;
        $this->jenis_instansi = $customer->jenis_instansi;
        $this->nama_customer = $customer->nama_customer;
        $this->telepon = $customer->telepon;
        $this->email = $customer->email;
        $this->npwp = $customer->npwp;
        $this->regencies_id = $customer->regencies_id;
        $this->regencies_name = $customer->regency->name;
        $this->alamat = $customer->alamat;
        $this->diskon = $customer->diskon;
        $this->keterangan = $customer->keterangan;
    }
}
