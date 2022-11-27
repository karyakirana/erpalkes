<?php

namespace App\Http\Livewire\Master;

use App\Mine\SubMaster\SalesAreaRepository;
use App\Models\Regency;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class AreaForm extends Component
{
    public $area_id;
    public $kode_area;
    public $nama_area;
    public $keterangan;

    public $dataDetail = [];
    public $index;
    public $regencies_id, $regencies_name;
    public $provinces_id, $provinces_name;

    public $mode = 'create';
    public $update = false;

    protected $listeners = [
        'store',
        'edit',
        'update',
        'resetForm'
    ];

    protected $rules = [
        'nama_area' => 'required|min:3',
    ];

    public function mount($area_id = null)
    {
        if ($area_id) {
            $mode = 'update';
            $area = SalesAreaRepository::getById($area_id);
            $this->kode_area = $area->kode_area;
            $this->nama_area = $area->nama_area;
            $this->keterangan = $area->keterangan;

            foreach ($area->salesAreaDetail as $item) {
                $this->dataDetail[] = [
                    'regencies_id'=>$item->regencies_id,
                    'regencies_name'=>$item->regencies->name,
                    'provinces_name'=>$item->regencies->province->name
                ];
            }
        }
    }

    public function addLine()
    {
        $regencies = Regency::find($this->regencies_id);
        $this->dataDetail[] = [
            'regencies_id'=>$regencies->id,
            'regencies_name'=>$regencies->name,
            'provinces_name'=>$regencies->province->name
        ];
    }

    public function removeLine($index)
    {
        unset($this->dataDetail);
        $this->dataDetail = array_values($this->dataDetail);
    }

    protected function setData()
    {
        return $this->validate([
            'area_id'=>($this->area_id) ? 'required' : 'nullable',
            'nama_area'=> 'required|min:3',
            'keterangan'=>'nullable',
            'dataDetail'=>'required|array'
        ]);
    }

    public function store()
    {
        $data = $this->setData();
        DB::beginTransaction();
        try {
            DB::commit();
            SalesAreaRepository::store($data);
        } catch (ModelNotFoundException $e){
            DB::rollBack();
        }
        // redirect
    }

    public function update()
    {
        $data = $this->setData();
        DB::beginTransaction();
        try {
            DB::commit();
            SalesAreaRepository::update($data);
        } catch (ModelNotFoundException $e){
            DB::rollBack();
        }
        // redirect
    }

    public function render()
    {
        return view('livewire.master.area-form');
    }
}
