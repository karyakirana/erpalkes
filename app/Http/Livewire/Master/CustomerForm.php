<?php

namespace App\Http\Livewire\Master;

use App\Models\Master\Customer;
use App\Models\Master\SalesArea;
use Livewire\Component;

class CustomerForm extends Component
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
    public $diskon;
    public $keterangan;

    public $update = false;

    protected $listeners = [
        'setArea',
        'resetForm'
    ];

    public function mount($customer_id = null)
    {
        if ($customer_id){
            $this->update = true;
            $customer = Customer::find($customer_id);
        }
    }

    public function setArea(SalesArea $salesArea)
    {
        $this->area_id = $salesArea->id;
        $this->nama_area = $salesArea->nama_area;
    }

    protected function kode()
    {
        // generate kode
        return null;
    }

    public function resetForm()
    {
        $this->reset([
            'customer_id', 'kode', 'jenis_instansi', 'area_id', 'nama_area',
            'nama_customer', 'telepon', 'email', 'npwp', 'alamat', 'diskon',
            'keterangan'
        ]);
    }

    public function store()
    {
        $customer = Customer::create([
            'kode'=>$this->kode,
            'jenis_instansi' => $this->jenis_instansi,
            'area_id' => $this->area_id,
            'nama_customer' => $this->nama_customer,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'npwp' => $this->npwp,
            'alamat' => $this->alamat,
            'diskon' => $this->diskon,
            'keterangan' => $this->keterangan
        ]);
        // redirect
    }

    public function update()
    {
        $customer = Customer::find($this->customer_id);
        $customer->update([
            'jenis_instansi' => $this->jenis_instansi,
            'area_id' => $this->area_id,
            'nama_customer' => $this->nama_customer,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'npwp' => $this->npwp,
            'alamat' => $this->alamat,
            'diskon' => $this->diskon,
            'keterangan' => $this->keterangan
        ]);
        // redirect
    }

    public function render()
    {
        return view('livewire.master.customer-form');
    }
}
