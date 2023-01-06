<?php

namespace App\Http\Livewire\Pembelian;

use App\Http\Livewire\Penjualan\LoadPenjualanPreorderTrait;
use App\Http\Livewire\ProdukTransaksiLineTrait;
use App\Http\Requests\Pembelian\PembelianRequest;
use App\Mine\SubPembelian\PembelianService;
use App\Models\Master\Lokasi;
use App\Models\Master\Produk;
use Carbon\Carbon;
use Livewire\Component;

class PembelianForm extends Component
{
    use LoadPenjualanPreorderTrait;

    public $pembelian_id;
    public $pembelian_po_id;
    public $tgl_nota;
    public $tgl_tempo;
    public $active_cash;
    public $kode;
    public $gudang_id, $gudang_nama;
    public $supplier_id, $supplier_nama;
    public $user_id;
    public $status = 'belum';
    public $total_sub_total;
    public $total_barang;
    public $ppn;
    public $biaya_lain;
    public $total_bayar;
    public $keterangan;

    public $mode = 'create';

    public $update = false;
    public $dataDetail = [];
    public $produk_id, $produk_nama, $harga, $harga_setelah_diskon;
    public $kemasan_id, $kemasan_nama, $kemasan_isi, $satuan_beli, $satuan_jual;
    public $kemasan_jumlah, $kemasan_harga;
    public $jumlah, $diskon, $sub_total;

    public $dataKemasan = [];

    protected $listeners = [
        'setProduk',
        'setPreorder',
        'setLokasi'
    ];

    public function __construct($id = null)
    {
        $this->tgl_nota = tanggalan_format(Carbon::now());
        $this->tgl_tempo = tanggalan_format(Carbon::now());
        parent::__construct($id);
    }

    public function mount($pembelian_id = null)
    {
        $this->user_id = \Auth::id();
        if ($pembelian_id){
            $this->update = true;
            $pembelian = (new PembelianService())->handleById($pembelian_id);
            $this->pembelian_id = $pembelian->id;
            $this->tgl_nota = $pembelian->tgl_nota;
            $this->tgl_tempo = $pembelian->tgl_tempo;
            $this->supplier_id = $pembelian->supplier_id;
            $this->supplier_nama = $pembelian->supplier->nama_supplier;
            $this->status = $pembelian->status;
            $this->total_barang = $pembelian->total_barang;
            $this->ppn = $pembelian->ppn;
            $this->biaya_lain = $pembelian->biaya_lain;
            $this->total_bayar = $pembelian->total_bayar;
            $this->keterangan = $pembelian->keterangan;

            foreach ($pembelian->pembelianDetail as $item) {
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

    public function setLokasi(Lokasi $lokasi)
    {
        $this->gudang_id = $lokasi->id;
        $this->gudang_nama = $lokasi->gudang->lokasi;
    }

    public function rules()
    {
        return (new PembelianRequest())->rules();
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

    protected function hitungKemasan()
    {
        // konversi kemasan jumlah
        // konversi kemasan harga
        // isi kemasan
        if ((int)$this->kemasan_isi == 0){
            $this->jumlah = $this->kemasan_jumlah;
            $this->harga = $this->kemasan_harga;
        }

        if ((int)$this->kemasan_isi > 0){
            $this->jumlah = (int) $this->kemasan_jumlah * (int) $this->kemasan_isi;
            $this->harga = (int) $this->kemasan_harga / (int) $this->kemasan_isi;
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
        $this->total_bayar = (int) $this->ppn + (int) $this->biaya_lain + (int) $this->total_sub_total;
    }

    protected function updatedKemasanJumlah()
    {
        $this->hitungKemasan();
    }

    protected function updatedKemasanHarga()
    {
        $this->hitungKemasan();
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

    public function updatedKemasanId($value)
    {
        $this->kemasan_isi = $this->dataKemasan[$value]->isi;
        $this->satuan_beli = $this->dataKemasan[$value]->kemasan;
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
        $this->validate([
            'produk_nama' => 'required',
            'jumlah' => 'required|numeric',
            'sub_total' => 'required|numeric'
        ]);
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
        $store = (new PembelianService())->handleStore($data);
        // redirect
        session()->flash('message', 'Data sudah disimpan.');
        return redirect()->to(route('pembelian'));
    }

    public function update()
    {
        $data = $this->validate();
        $update = (new PembelianService())->handleUpdate($data);
        // redirect
        session()->flash('message', 'Data sudah disimpan.');
        return redirect()->to(route('pembelian'));
    }

    public function render()
    {
        return view('livewire.pembelian.pembelian-form');
    }
}
