<?php

namespace App\Http\Livewire\Master;

use App\Http\Requests\Master\CustomerCNRequest;
use App\Mine\SubMaster\CustomerCNRepository;
use App\Models\Master\Customer;
use Livewire\Component;

class CustomercnForm extends Component
{
    public $customecn_id;
    public $customer_id, $customer_nama;
    public $user_id;
    public $penerima_cn;
    public $jabatan_cn;
    public $unit_cn;
    public $keterangan;

    public $update = false;

    protected $listeners = [
        'setCustomer'
    ];

    public function mount($customercn_id = null)
    {
        $this->user_id = auth()->id();
        if ($customercn_id){
            $this->update = true;
            $data = CustomerCNRepository::getById($customercn_id);
            $this->customecn_id = $data->id;
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

    public function rules()
    {
        return (new CustomerCNRequest())->rules();
    }

    public function store()
    {
        $data = $this->validate();
        CustomerCNRepository::store($data);
        // redirect
        return redirect()->route('customercn');
    }

    public function update()
    {
        $data = $this->validate();
        CustomerCNRepository::update($data, $this->customecn_id);
        // redirect
        return redirect()->route('customercn');
    }
    public function render()
    {
        return view('livewire.master.customercn-form');
    }
}
