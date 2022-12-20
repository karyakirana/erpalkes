<?php

namespace App\Http\Livewire\Master;

use App\Http\Requests\Master\PegawaiSalesAreaRequest;
use App\Mine\SubMaster\PegawaiSalesAreaRepository;
use App\Models\Master\Pegawai;
use App\Models\Regency;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class AreaForm extends Component
{
    public $pegawai_sales_area_id;
    public $kode;
    public $pegawai_id, $pegawai_nama;
    public $nama;

    public $dataDetail = [];
    public $index;
    public $kota_id, $kota_nama;
    public $provinces_nama;

    public $mode = 'create';
    public $update = false;

    protected $listeners = [
        'setCity',
        'setPegawai',
        'updateLine',
    ];

    public function mount($area_id = null)
    {
        if ($area_id) {
            $this->update = true;
            $area = PegawaiSalesAreaRepository::getById($area_id);
            $this->nama = $area->nama;

            foreach ($area->pegawaiSalesAreaDetail as $item) {
                $this->dataDetail[] = [
                    'kota_id'=>$item->regencies_id,
                    'kota_nama'=>$item->kota->name,
                    'provinces_name'=>$item->kota->province->name
                ];
            }
        }
    }

    public function rules()
    {
        return (new PegawaiSalesAreaRequest())->rules();
    }

    public function setRegencies($id)
    {
        $this->kota_id = $id;
    }

    public function setCity($kota_id)
    {
        $regencies = Regency::find($kota_id);
        $this->dataDetail[] = [
            'kota_id'=>$regencies->id,
            'kota_nama'=>$regencies->name,
            'provinces_name'=>$regencies->province->name
        ];
        $this->emit('modalCitySetHide');
    }

    public function setPegawai(Pegawai $pegawai)
    {
        $this->pegawai_id = $pegawai->id;
        $this->pegawai_nama = $pegawai->nama;
        $this->emit('modalPegawaiSetHide');
    }

    public function removeLine($index)
    {
        unset($this->dataDetail[$index]);
        $this->dataDetail = array_values($this->dataDetail);
    }

    public function store()
    {
        $data = $this->validate();
        DB::beginTransaction();
        try {
            DB::commit();
            PegawaiSalesAreaRepository::store($data);
        } catch (ModelNotFoundException $e){
            DB::rollBack();
        }
        // redirect
        session()->flash('message', 'Data Area sudah tersimpan.');
        return redirect()->route('area');
    }

    public function update()
    {
        $data = $this->validate();
        DB::beginTransaction();
        try {
            DB::commit();
            PegawaiSalesAreaRepository::update($data, $this->pegawai_sales_area_id);
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
