<?php

namespace App\Http\Livewire\Master;

use App\Models\Master\Customer;
use App\Models\master\PenerimaCN;
use Livewire\Component;

class PenerimaCnForm extends Component
{
    public $penerimaancn_id;
    public $kode;
    public $customer_id, $customer_nama;
    public $penerima_cn;
    public $jabatan_cn;
    public $unit_cn;
    public $keterangan;

    public $update = false;

    protected $listeners = [
        'setCustomer'
    ];

    protected $rules = [
        'customer_nama'=>'required|min:3',
        'penerima_cn'=>'required:min:3',
    ];

    public function mount($penerimaancn_id = null)
    {
        if ($penerimaancn_id = null){
            $this->update = true;
            $data = PenerimaCN::find($penerimaancn_id);
            $this->penerimaancn_id = $data->penerima_cn;
            $this->kode = $data->kode;
            $this->customer_id = $data->customer_id;
            $this->customer_nama = $data->customer->nama_customer;
            $this->penerima_cn = $data->penerima_cn;
            $this->jabatan_cn = $data->jabatan_cn;
            $this->unit_cn = $data->unit_cn;
            $this->keterangan = $data->keterangan;
        }
    }

    public function setCustomer(Customer $customer)
    {
        $this->customer_id = $customer->id;
        $this->customer_nama = $customer->nama_customer;
        $this->emit('modalCustomerSetHide');
    }

    protected function kode()
    {
        $penerimaCn = PenerimaCN::latest('kode')->first();
        if (!$penerimaCn){
            $num = 1;
        } else {
            $lastNum = (int) $penerimaCn->last_num_master;
            $num = $lastNum + 1;
        }
        return "R".sprintf("%05s", $num);
    }

    public function store()
    {
        $this->validate();
        $penerimaCn = PenerimaCN::create([
            'kode' => $this->kode(),
            'penerima_cn' => $this->penerima_cn,
            'customer_id' => $this->customer_id,
            'jabatan_cn' => $this->jabatan_cn,
            'unit_cn' => $this->unit_cn,
            'keterangan' => $this->keterangan
        ]);
        // redirect
    }

    public function update()
    {
        $this->validate();
        $penerimaCn = PenerimaCN::find($this->penerimaancn_id);
        $penerimaCn->update([
            'customer_id' => $this->customer_id,
            'jabatan_cn' => $this->jabatan_cn,
            'unit_cn' => $this->unit_cn,
            'keterangan' => $this->keterangan
        ]);
        // redirect
    }

    public function render()
    {
        return view('livewire.master.penerima-cn-form');
    }
}
