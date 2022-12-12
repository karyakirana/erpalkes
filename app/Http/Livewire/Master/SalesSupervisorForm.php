<?php

namespace App\Http\Livewire\Master;

use Livewire\Component;

class SalesSupervisorForm extends Component
{
    public $sales_supervisor_id;
    public $pegawai_id, $pegawai_nama;
    public $area_id, $area_nama;

    public $dataDetail = [];
    public $sales_id, $sales_name;
    public $kota, $kota_nama;

    protected $listeners = [];

    public function addDetail()
    {
        $this->dataDetail[] = [
            'sales_id' => $this->sales_id,
            'sales_name' => $this->sales_name,
            'kota' => $this->kota,
            'kota_nama' => $this->kota_nama
        ];
        $this->reset('sales_id', 'kota', 'kota_nama');
    }

    public function removeDetail($index)
    {
        unset($this->dataDetail[$index]);
        $this->dataDetail = array_values($this->dataDetail);
    }

    public function render()
    {
        return view('livewire.master.sales-supervisor-form');
    }
}
