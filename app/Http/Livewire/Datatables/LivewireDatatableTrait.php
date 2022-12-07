<?php namespace App\Http\Livewire\Datatables;

trait LivewireDatatableTrait
{
    public function setTableClass()
    {
        return 'table table-rounded table-hover table-striped border align-middle fs-6 gs-7';
    }

    public function setTableRowClass($row): ?string
    {
        return 'border-bottom border-gray-200';
    }
}
