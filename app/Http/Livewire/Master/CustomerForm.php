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

    protected $messages = [];

    public function mount($customer_id = null)
    {
        if ($customer_id){
            $this->update = true;
            $customer = Customer::find($customer_id);
            $this->kode = $customer->kode;
            $this->jenis_instansi = $customer->jenis_instansi;
            $this->area_id = $customer->area_id;
            $this->nama_area = $customer->area->nama_area;
            $this->nama_customer = $customer->nama_customer;
            $this->telepon = $customer->telepon;
            $this->email = $customer->email;
            $this->npwp = $customer->npwp;
            $this->alamat = $customer->alamat;
            $this->diskon = $customer->diskon;
            $this->keterangan = $customer->keterangan;
        }
    }

    protected function kode()
    {
        // generate kode
        $customer = Customer::latest('kode')->first();
        if (!$customer){
            $num = 1;
        } else {
            $lastNum = (int) $customer->last_num_master;
            $num = $lastNum + 1;
        }
        return "C".sprintf("%05s", $num);
    }

    public function resetForm()
    {
        $this->reset([
            'customer_id', 'kode', 'jenis_instansi', 'area_id', 'nama_area',
            'nama_customer', 'telepon', 'email', 'npwp', 'alamat', 'diskon',
            'keterangan'
        ]);
    }

    protected function setData()
    {
        $this->kode = $this->kode();
        return $this->validate([
            'kode'=>'required',
            'jenis_instansi'=>'required',
            'area_id'=>'required',
            'nama_customer'=>'required',
            'telepon'=>'nullable',
            'email'=>'nullable',
            'npwp'=>'nullable',
            'alamat'=>'nullable',
            'diskon'=>'nullable',
            'keterangan'=>'nullable'
        ]);
    }

    public function store()
    {
        $data = $this->setData();
        $customer = Customer::create($data);
        // redirect
        return redirect()->route('customer');
    }

    public function update()
    {
        $customer = Customer::find($this->customer_id);
        $data = $this->setData();
        unset($data['kode']);
        $customer->update($data);
        // redirect
        return redirect()->route('customer');
    }

    public function render()
    {
        return view('livewire.master.customer-form');
    }
}
