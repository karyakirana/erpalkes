<?php namespace App\Models;

trait KodeTrait
{
    public function getLastNumMasterAttribute()
    {
        return substr($this->kode, 1, 5);
    }

    public function getLastNum2MasterAttribute()
    {
        return substr($this->kode, 2, 6);
    }

    public function getLastNumTransAttribute()
    {
        return substr($this->kode, 0, 4);
    }

    public function getLastNumCharAttribute()
    {
        return substr($this->kode, 0, strpos($this->kode, '/'));
    }
}
