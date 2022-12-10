<?php

namespace App\Http\Livewire\Master;

use App\Mine\SubMaster\CustomerRepository;
use Livewire\Component;

class CustomerDetailSidebar extends Component
{
    use CustomerFormTrait;
    use CitySetTrait;

    protected $listeners = [
        'setCity'
    ];

    public function mount($customer_id)
    {
        $customer = CustomerRepository::getById($customer_id);
        $this->loadCustomer($customer_id);
    }

    public function edit()
    {
        $this->emit('customerModalFormShow');
    }

    public function update()
    {
        $data = $this->validate();
        $repo = CustomerRepository::update($data, $this->customer_id);
        $this->emit('customerModalFormHide');
    }

    public function render()
    {
        return view('livewire.master.customer-detail-sidebar');
    }
}
