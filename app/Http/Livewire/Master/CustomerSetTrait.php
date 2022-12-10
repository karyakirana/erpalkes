<?php namespace App\Http\Livewire\Master;

use App\Models\Master\Customer;

trait CustomerSetTrait
{
    public $customer_id, $customer_nama;
    public function setCustomer(Customer $customer)
    {
        $this->customer_id = $customer->id;
        $this->customer_nama = $customer->nama_customer;
        $this->emit('modalCustomerSetHide');
    }
}
