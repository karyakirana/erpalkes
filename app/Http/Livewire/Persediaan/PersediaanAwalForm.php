<?php

namespace App\Http\Livewire\Persediaan;

use App\Http\Livewire\Master\ProdukSetTrait;
use App\Http\Requests\Persediaan\PersediaanAwalRequest;
use App\Http\Requests\PersediaanAwalDetailRequest;
use App\Mine\SubMaster\GudangRepository;
use App\Mine\SubPersediaan\PersediaanAwalService;
use Livewire\Component;

class PersediaanAwalForm extends Component
{
    use ProdukSetTrait;

    protected $listeners = [
        'setProduk'
    ];
    public $persediaan_awal_id;
    public $tgl_persediaan_awal;
    public $kondisi;
    public $gudang_id;
    public $user_id;
    public $total_barang;
    public $total_nominal;
    public $keterangan;

    public $update = false;
    public $mode = 'create';

    public $dataDetail = [];
    public $index;
    public $produk_id, $produk_nama;
    public $is_expired = false;
    public $batch;
    public $tgl_expired;
    public $harga;
    public $jumlah;
    public $sub_total;
    public function __construct($id = null)
    {
        $this->tgl_persediaan_awal = tanggalan_format(now('ASIA/JAKARTA'));
        $this->tgl_expired = tanggalan_format(now('ASIA/JAKARTA'));
        parent::__construct($id);
    }

    public function mount($persediaan_awal_id = null)
    {
        $this->user_id = \Auth::id();
        if ($persediaan_awal_id){
            $this->mode = 'update';
            $data = (new PersediaanAwalService())->handleEdit($persediaan_awal_id);
            $this->persediaan_awal_id = $data->id;
            $this->kondisi = $data->kondisi;
            $this->gudang_id = $data->gudang_id;
            $this->total_barang = $data->total_barang;
            $this->total_nominal = $data->total_nominal;
            $this->keterangan = $data->keterangan;

            foreach ($data->persediaanAwalDetail as $row){
                $this->dataDetail[] = [
                    'produk_id' => $row->produk_id,
                    'produk_nama' => $row->produk->nama_produk,
                    'batch' => $row->batch,
                    'tgl_expired' => $row->tgl_expired,
                    'jumlah' => $row->jumlah,
                    'harga' => $row->harga,
                    'sub_total' => $row->sub_total
                ];
            }
        }
    }

    protected function hitungSubTotal()
    {
        $this->sub_total = (int) $this->harga * (int) $this->jumlah;
    }

    public function updatedHarga()
    {
        $this->hitungSubTotal();
    }

    public function updatedJumlah()
    {
        $this->hitungSubTotal();
    }

    public function resetForm()
    {
        $this->reset([
            'produk_id', 'produk_nama',
            'batch', 'tgl_expired',
            'harga', 'jumlah', 'sub_total'
        ]);
    }

    public function addLine()
    {
        $this->validate([
            'produk_nama' => 'required',
            'batch' => 'nullable',
            'tgl_expired' => ($this->is_expired) ? 'required' : 'nullable',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'sub_total' => 'required|numeric'
        ]);
        $this->dataDetail[] = [
            'produk_id' => $this->produk_id,
            'produk_nama' => $this->produk_nama,
            'batch' => ($this->is_expired) ? $this->batch : null,
            'tgl_expired' => ($this->is_expired) ? $this->tgl_expired : null,
            'harga' => $this->harga,
            'jumlah' => $this->jumlah,
            'sub_total' => $this->sub_total
        ];
        $this->resetForm();
    }

    public function editLine($index)
    {
        $this->update = true;
        $this->index = $index;
        $this->produk_id = $this->dataDetail['produk_id'];
        $this->produk_nama = $this->dataDetail['produk_nama'];
        $this->is_expired = (is_null($this->dataDetail['tgl_expired']));
        $this->batch = $this->dataDetail['batch'];
        $this->tgl_expired = $this->dataDetail['tgl_expired'];
        $this->jumlah = $this->dataDetail['jumlah'];
        $this->sub_total = $this->dataDetail['sub_total'];
    }

    public function updateLine()
    {
        $this->validate([
            'produk_nama' => 'required',
            'batch' => 'nullable',
            'tgl_expired' => ($this->is_expired) ? 'required' : 'nullable',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'sub_total' => 'required|numeric'
        ]);
        $index = $this->index;
        $this->dataDetail['produk_id'] = $this->produk_id;
        $this->dataDetail['produk_nama'] = $this->produk_nama;
        $this->dataDetail['batch'] = ($this->is_expired) ? $this->batch : null;
        $this->dataDetail['tgl_expired'] = ($this->is_expired) ? $this->tgl_expired : null;
        $this->dataDetail['jumlah'] = $this->jumlah;
        $this->dataDetail['sub_total'] = $this->sub_total;
        $this->resetForm();
    }

    public function removeLine($index)
    {
        unset($this->dataDetail[$index]);
        $this->dataDetail = array_values($this->dataDetail);
    }

    public function rules()
    {
        return (new PersediaanAwalRequest())->rules();
    }

    public function messages()
    {
        return [
            'produk_nama.required' => 'Produk harus diisi.',
            'dataDetail.required' => 'Data Produk harus diisi.'
        ];
    }

    protected function total()
    {
        $this->total_barang = array_sum(array_column($this->dataDetail, 'jumlah'));
        $this->total_nominal = array_sum(array_column($this->dataDetail, 'sub_total'));
    }

    public function store()
    {
        $this->total();
        $data = $this->validate();
        $store = (new PersediaanAwalService())->handleStore($data);
        if ($store->status){
            return redirect()->route('persediaan.awal');
        }
        session()->flash('message', $store->message);
        return null;
    }

    public function update()
    {
        $this->total();
        $data = $this->validate();
        (new PersediaanAwalService())->handleUpdate($data);
    }

    public function render()
    {
        return view('livewire.persediaan.persediaan-awal-form', [
            'dataGudang' => GudangRepository::datatables()->get()
        ]);
    }
}
