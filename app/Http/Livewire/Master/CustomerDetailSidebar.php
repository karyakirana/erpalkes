<?php

namespace App\Http\Livewire\Master;

use App\Http\Requests\Master\CustomerRequest;
use App\Mine\SubMaster\CustomerRepository;
use Livewire\Component;

class CustomerDetailSidebar extends Component
{
    public $customer_id;

    public function mount($customer_id)
    {
        $customer = CustomerRepository::getById($customer_id);
        $this->customer_id = $customer->id;
    }

    public function rules()
    {
        return (new CustomerRequest())->rules();
    }

    public function edit()
    {
        $this->emit('editCustomerDetail');
    }

    public function update()
    {
        $data = $this->validate();
    }

    public function render()
    {
        return view('livewire.master.customer-detail-sidebar');
    }
}
