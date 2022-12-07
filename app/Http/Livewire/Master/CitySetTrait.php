<?php namespace App\Http\Livewire\Master;

use App\Models\Regency;

trait CitySetTrait
{
    public $regencies_id;
    public $regencies_name;

    public function setCity(Regency $regency)
    {
        $this->regencies_id = $regency->id;
        $this->regencies_name = $regency->name;
        $this->emit('modalCitySetHide');
    }
}
