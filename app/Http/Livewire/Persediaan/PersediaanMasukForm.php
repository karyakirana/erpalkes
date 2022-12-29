<?php

namespace App\Http\Livewire\Persediaan;

use App\Http\Livewire\Master\ProdukSetTrait;
use App\Http\Requests\Persediaan\PersediaanMasukRequest;
use App\Mine\SubMaster\GudangRepository;
use App\Mine\SubPersediaan\PersediaanMasukService;
use Livewire\Component;

class PersediaanMasukForm extends Component
{
    use ProdukSetTrait;

    protected $listeners = ['setProduk'];

    public $persediaan_masuk_id;
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
    public $batch;
    public $tgl_expired;
    public $jumlah;
    public $harga;
    public $sub_total;
    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    public function mount($persediaan_masuk_id = null)
    {
        $this->user_id = \Auth::id();
        if ($persediaan_masuk_id){
            $this->mode = 'update';

            $data = (new PersediaanMasukService())->handleEdit($persediaan_masuk_id);
            $this->persediaan_masuk_id = $data->id;
            $this->kondisi = $data->kondisi;
            $this->gudang_id = $data->gudang_id;
            $this->total_barang = $data->total_barang;
            $this->total_nominal = $data->total_nominal;
            $this->keterangan = $data->keterangan;

            foreach ($data->persediaanMasukDetail as $row){
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

    public function hitungSubTotal()
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
        $this->dataDetail[] = [
            'produk_id' => $this->produk_id,
            'produk_nama' => $this->produk_nama,
            'batch' => $this->batch,
            'tgl_expired' => $this->tgl_expired,
            'harga' => $this->harga,
            'jumlah' => $this->jumlah,
            'sub_total' => $this->sub_total
        ];
        $this->resetForm();
    }

    public function editline($index)
    {
        $this->update = true;
        $this->index = $index;
        $this->produk_id = $this->dataDetail['produk_id'];
        $this->produk_nama = $this->dataDetail['produk_nama'];
        $this->batch = $this->dataDetail['batch'];
        $this->tgl_expired = $this->dataDetail['tgl_expired'];
        $this->jumlah = $this->dataDetail['jumlah'];
        $this->sub_total = $this->dataDetail['sub_total'];
    }

    public function updateLine()
    {
        $index = $this->index;
        $this->dataDetail['produk_id'] = $this->produk_id;
        $this->dataDetail['produk_nama'] = $this->produk_nama;
        $this->dataDetail['batch'] = $this->batch;
        $this->dataDetail['tgl_expired'] = $this->tgl_expired;
        $this->dataDetail['jumlah'] = $this->jumlah;
        $this->dataDetail['sub_total'] = $this->sub_total;
        $this->resetForm();
    }

    public function removeline($index)
    {
        unset($this->dataDetail[$index]);
        $this->dataDetail = array_values($this->dataDetail);
    }

    public function rules()
    {
        $data = $this->validate();
        (new PersediaanMasukRequest())->handleStore($data);
    }

    public function store()
    {
        $data = $this->validate();
        (new PersediaanMasukService())->handleStore($data);
    }

    public function update()
    {
        $data = $this->validate();
        (new PersediaanMasukService())->handleStore($data);
    }

    public function render()
    {
        return view('livewire.persediaan.persediaan-masuk-form', [
            'dataGudang' => GudangRepository::datatables()->get()
        ]);
    }
}
