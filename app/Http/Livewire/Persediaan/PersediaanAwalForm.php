<?php

namespace App\Http\Livewire\Persediaan;

use App\Http\Livewire\Master\ProdukSetTrait;
use App\Http\Requests\Persediaan\PersediaanAwalRequest;
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
    public $tanggal_persediaan_awal;
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
    public $harga;
    public $jumlah;
    public $sub_total;
    public function __construct($id = null)
    {
        $this->tanggal_persediaan_awal = tanggalan_format(now('ASIA/JAKARTA'));
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
        $this->dataDetail[] = [
            'produk_id' => $this->produk_id,
            'produk_nama' => $this->produk_nama,
            'batch' => $this->batch,
            'tgl-expired' => $this->tgl_expired,
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
        $this->batch = $this->dataDetail['batch'];
        $this->tgl_expired = $this->dataDetail['tgl-expired'];
        $this->jumlah = $this->dataDetail['jumlah'];
        $this->sub_total = $this->dataDetail['sub_total'];
    }

    public function updateLine()
    {
        $index = $this->index;
        $this->dataDetail['produk_id'] = $this->produk_id;
        $this->dataDetail['produk_nama'] = $this->produk_nama;
        $this->dataDetail['batch'] = $this->batch;
        $this->dataDetail['tgl-expired'] = $this->tgl_expired;
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

    public function store()
    {
        $data = $this->validate();
        (new PersediaanAwalService())->handleStore($data);
    }

    public function update()
    {
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
