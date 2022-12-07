<?php

namespace App\Http\Livewire\Master;

use App\Mine\SubMaster\CustomerRepository;
use Livewire\Component;

class CustomerForm extends Component
{
    use CustomerFormTrait;
    use CitySetTrait;

    public $update = false;

    protected $listeners = [
        'setArea',
        'resetForm',
        'setCity'
    ];

    public function mount($customer_id = null)
    {
        if ($customer_id){
            $this->update = true;
            $this->loadCustomer($customer_id);
        }
    }

    public function store()
    {
        $data = $this->validate();
        $customer = CustomerRepository::store($data);
        // redirect
        return redirect()->route('customer');
    }

    public function update()
    {
        $data = $this->validate();
        CustomerRepository::update($data, $this->customer_id);
        // redirect
        return redirect()->route('customer');
    }

    public function render()
    {
        return view('livewire.master.customer-form');
    }
}
