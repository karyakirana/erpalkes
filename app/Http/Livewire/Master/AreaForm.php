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
        'setRegencies',
        'updateLine',
    ];

    protected $rules = [
        'nama_area' => 'required|min:3',
    ];

    protected $messages = [
        'regencies_id.required' => 'The City cannot be empty.',
        'dataDetail.required' => 'Nama Kota Belum diinputkan'
    ];

    public function mount($area_id = null)
    {
        if ($area_id) {
            $this->update = true;
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

    public function setRegencies($id)
    {
        $this->regencies_id = $id;
        $this->dispatchBrowserEvent('pharaonic.select2.init');
    }

    public function addLine()
    {
        $this->validate([
            'regencies_id'=>'required'
        ]);
        $regencies = Regency::find($this->regencies_id);
        $this->dataDetail[] = [
            'regencies_id'=>$regencies->id,
            'regencies_name'=>$regencies->name,
            'provinces_name'=>$regencies->province->name
        ];
    }

    public function removeLine($index)
    {
        unset($this->dataDetail[$index]);
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
        session()->flash('message', 'Data Area sudah tersimpan.');
        return redirect()->route('area');
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
        session()->flash('message', 'Data Area sudah terupdate.');
        return redirect()->route('area');
    }

    public function render()
    {
        return view('livewire.master.area-form');
    }
}
