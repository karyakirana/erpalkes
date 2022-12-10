<?php namespace App\Http\Livewire\Master;

use App\Http\Requests\Master\PenerimaCNRequest;
use App\Mine\SubMaster\PenerimaCnRepository;

trait PenerimaCnFormTrait
{
    public $penerimacn_id;
    public $kode;
    public $customer_id, $customer_nama;
    public $penerima_cn;
    public $jabatan_cn;
    public $unit_cn;
    public $keterangan;

    protected function loadData($penerima_cn_id)
    {
        $data = PenerimaCnRepository::getById($penerima_cn_id);
        $this->penerimacn_id = $data->id;
        $this->kode = $data->kode;
        $this->customer_id = $data->customer_id;
        $this->customer_nama = $data->customer->nama_customer;
        $this->penerima_cn = $data->penerima_cn;
        $this->jabatan_cn = $data->jabatan_cn;
        $this->unit_cn = $data->unit_cn;
        $this->keterangan = $data->keterangan;
    }

    public function rules()
    {
        return (new PenerimaCNRequest())->rules();
    }
}
