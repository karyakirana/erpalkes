<?php

namespace App\Http\Livewire\Penjualan;

use App\Http\Livewire\ProdukTransaksiLineTrait;
use App\Http\Requests\Penjualan\PenjualanPreorderRequest;
use App\Mine\SubPembelian\PenjualanPreorderService;
use App\Models\Master\Produk;
use Livewire\Component;

class PenjualanPreOrderForm extends Component
{
    use PenjualanDetailTrait;

    protected $listeners = [
        'setProduk'
    ];

    public $penjualan_preorder_id;
    public $penjualan_quotation_id;
    public $tgl_preorder;
    public $kode;
    public $tipe;
    public $customer_id;
    public $sales_id;
    public $user_id;
    public $status;
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

    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    public function mount($penjualan_preorder_id = null)
    {
        if($penjualan_preorder_id){
            $this->mode = 'update';
            $penjualan_preorder = (new PenjualanPreorderService())->handleEdit($penjualan_preorder_id);
            $this->penjualan_quotation_id = $penjualan_preorder_id->penjualan_quotation_id;
            $this->tgl_preorder = $penjualan_preorder_id->tgl_preorder;
            $this->tgl_preorder = $penjualan_preorder_id->tgl_preorder;
            $this->customer_id = $penjualan_preorder_id->customer_id;
            $this->customer_id = $penjualan_preorder_id->customer_id;
            $this->user_id = $penjualan_preorder_id->user_id;
            $this->status = $penjualan_preorder_id->status;
            $this->total_barang = $penjualan_preorder_id->total_barang;
            $this->total_ppn = $penjualan_preorder_id->total_ppn;
            $this->total_biaya_lain = $penjualan_preorder_id->total_biaya_lain;
            $this->total_bayar = $penjualan_preorder_id->total_bayar;
            $this->keterangan = $penjualan_preorder_id->keterangan;

        }
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

    public function rules()
    {
        return (new PenjualanPreorderRequest())->rules();
    }

    public function store()
    {
        $data = $this->validate();
        (new PenjualanPreorderService())->handleStore($data);
    }

    public function update()
    {
        $data = $this->validate();
        (new PenjualanPreorderService())->handleUpdate($data);
    }

    public function render()
    {
        return view('livewire.penjualan.penjualan-pre-order-form');
    }
}
