<?php

namespace App\Http\Livewire\Penjualan;

use App\Http\Livewire\ProdukTransaksiLineTrait;
use App\Http\Requests\Penjualan\PenjualanRequest;
use App\Mine\SubPenjualan\PenjualanService;
use App\Models\Master\Produk;
use Livewire\Component;

class PenjualanForm extends Component
{
    use ProdukTransaksiLineTrait;

    public $penjualan_id;
    public $penjualan_preorder_id;
    public $tgl_penjualan;
    public $tgl_tempo;
    public $active_cash;
    public $kode;
    public $tipe; // tunai, tempo, dan kso
    public $customer_id, $customer_nama;
    public $sales_id, $sales_nama;
    public $user_id;
    public $status = 'belum';
    public $total_sub_total;
    public $total_barang;
    public $total_ppn;
    public $total_biaya_lain;
    public $total_bayar;
    public $keterangan;

    public $mode = 'create';

    public $update = false;
    public $dataDetail = [];
    public $produk_id, $produk_nama, $harga, $harga_setelah_diskon;
    public $kemasan, $satuan_jual;
    public $jumlah, $diskon, $sub_total;

    public $dataKemasan = [];

    protected $listeners = [
        'setProduk'
    ];

    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    public function mount($penjualan_id = null)
    {
        $this->user_id = \Auth::id();
        if ($penjualan_id){
            $this->update = true;
            $penjualan = (new PenjualanService())->handleById($penjualan_id);
            $this->penjualan_id = $penjualan->id;
            $this->tgl_penjualan = $penjualan->tgl_penjualan;
            $this->tgl_tempo = $penjualan->tgl_tempo;
            $this->tipe = $penjualan->tipe;
            $this->customer_id = $penjualan->customer_id;
            $this->customer_nama = $penjualan->customer->nama_customer;
            $this->sales_id = $penjualan->sales_id;
            $this->sales_nama = $penjualan->sales->nama;
            $this->status = $penjualan->status;
            $this->total_barang = $penjualan->total_barang;
            $this->total_ppn = $penjualan->total_ppn;
            $this->total_biaya_lain = $penjualan->total_biaya_lain;
            $this->total_bayar = $penjualan->total_bayar;
            $this->keterangan = $penjualan->keterangan;

            foreach ($penjualan->penjualanDetail as $item) {
                $this->dataDetail[] = [
                    'produk_id' => $item->produk_id,
                    'produk_nama' => $item->produk->nama_produk,
                    'kemasan' => $item->kemasan,
                    'satuan_jual' => $item->produk->satuan_jual,
                    'harga' => $item->harga,
                    'jumlah' => $item->jumlah,
                    'diskon' => $item->diskon,
                    'sub_total' => $item->sub_total
                ];
            }
            $this->hitungTotalSubTotal();
        }
    }

    public function rules()
    {
        return (new PenjualanRequest())->rules();
    }

    public function resetForm()
    {
        $this->reset([
            'index',
            'produk_id', 'produk_nama',
            'kemasan', 'satuan_jual', 'diskon',
            'harga', 'harga_setelah_diskon',
            'jumlah', 'sub_total'
        ]);
    }

    protected function hitungTotal()
    {
        $this->harga_setelah_diskon = (int) $this->harga - ((int) $this->harga * (int) $this->diskon / 100);
        $this->sub_total = ($this->harga_setelah_diskon * (int) $this->jumlah);
    }

    protected function hitungTotalSubTotal()
    {
        $this->total_sub_total = array_sum(array_column($this->dataDetail, 'sub_total'));
        $this->total_bayar = (int) $this->total_ppn + (int) $this->total_biaya_lain + (int) $this->total_sub_total;
    }

    public function updatedDiskon()
    {
        $this->hitungTotal();
    }

    public function updatedJumlah()
    {
        $this->hitungTotal();
    }

    public function updatedHarga()
    {
        $this->hitungTotal();
    }

    public function setProduk(Produk $produk)
    {
        $this->produk_id = $produk->id;
        $this->produk_nama = $produk->nama_produk;
        $this->satuan_jual = $produk->satuan_jual;
        $this->harga = $produk->harga;
        $this->dataKemasan = $produk->produkKemasan;
        $this->emit('modalProdukSetHide');
    }

    public function addLine()
    {
        $this->dataDetail[] = [
            'produk_id' => $this->produk_id,
            'produk_nama' => $this->produk_nama,
            'kemasan' => $this->kemasan,
            'satuan_jual' => $this->satuan_jual,
            'harga' => $this->harga,
            'diskon' => $this->diskon,
            'jumlah' => $this->jumlah,
            'sub_total' => $this->sub_total
        ];
        $this->hitungTotalSubTotal();
        $this->resetForm();
    }

    public function editLine($index)
    {
        $this->index = $index;
        $this->produk_id = $this->dataDetail[$index]['produk_id'];
        $this->produk_nama = $this->dataDetail[$index]['produk_nama'];
        $this->kemasan = $this->dataDetail[$index]['kemasan'];
        $this->satuan_jual = $this->dataDetail[$index]['satuan_jual'];
        $this->harga = $this->dataDetail[$index]['harga'];
        $this->jumlah = $this->dataDetail[$index]['jumlah'];
        $this->sub_total = $this->dataDetail[$index]['sub_total'];
        $this->hitungTotal();
    }

    public function updateLine()
    {
        $index = $this->index;
        $this->dataDetail[$index]['produk_id'] = $this->produk_id;
        $this->dataDetail[$index]['produk_nama'] = $this->produk_nama;
        $this->dataDetail[$index]['kemasan'] = $this->kemasan;
        $this->dataDetail[$index]['satuan_jual'] = $this->satuan_jual;
        $this->dataDetail[$index]['harga'] = $this->harga;
        $this->dataDetail[$index]['jumlah'] = $this->jumlah;
        $this->dataDetail[$index]['sub_total'] = $this->sub_total;
        $this->resetForm();
        $this->hitungTotalSubTotal();
    }

    public function destroyLine($index)
    {
        unset($this->dataDetail[$index]);
        $this->dataDetail = array_values($this->dataDetail);
        $this->hitungTotalSubTotal();
    }

    public function store()
    {
        $data = $this->validate();
        $store = (new PenjualanService())->handleStore($data);
        if($store->status){
            // redirect
            session()->flash('message', 'Data sudah disimpan.');
            return redirect()->to(route('penjualan'));
        }
        session()->flash('message', $store->keterangan);
        return null;
    }

    public function update()
    {
        $data = $this->validate();
        $update = (new PenjualanService())->handleUpdate($data);
        if($update->status){
            // redirect
            session()->flash('message', 'Data sudah disimpan.');
            return redirect()->to(route('penjualan'));
        }
        // redirect
        session()->flash('message', $update->keterangan);
        return null;
    }

    public function render()
    {
        return view('livewire.penjualan.penjualan-form');
    }
}
