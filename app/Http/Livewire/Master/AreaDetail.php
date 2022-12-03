<?php

namespace App\Http\Livewire\Master;

use App\Models\Master\SalesArea;
use Livewire\Component;

class AreaDetail extends Component
{
    public $area;

    protected $listeners = [
        'detailArea',
        'resetForm'
    ];

    public function resetForm()
    {
        $this->reset(['area']);
    }

    public function detailArea($area_id)
    {
        $this->area = SalesArea::find($area_id);
        $this->emit('modalAreaDetailShow');
    }

    public function render()
    {
        return view('livewire.master.area-detail');
    }
}
