<?php

namespace App\Http\Livewire\Pembelian;

use App\Http\Livewire\ProdukTransaksiLineTrait;
use App\Http\Requests\Pembelian\PembelianPreorderRequest;
use App\Mine\SubPembelian\PembelianPreorderService;
use Livewire\Component;

class PembelianPreOrderForm extends Component
{

    protected $listeners = [
        'setProduk'
    ];

    public $pembelian_preorder_id;
    public $pembelian_quotation_id;
    public $tgl_pembelian_po;
    public $kode;
    public $supplier_id, $supplier_nama;
    public $user_id;
    public $status;
    public $total_barang;
    public $ppn;
    public $biaya_lain;
    public $total_bayar;
    public $keterangan;

    public $update = false;
    public $mode = 'create';

    public $dataDetail = [];
    public $index;
    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    public function mount($pembelian_preorder_id = null)
    {
        if ($pembelian_preorder_id){
            $this->mode = 'update';
            $pembelian_preorder = (new PembelianPreorderService())->handleEdit($pembelian_preorder_id);
            $this->pembelian_preorder_id = $pembelian_preorder->id;
            $this->pembelian_quotation_id = $pembelian_preorder->pembelian_quotation_id;
            $this->tgl_pembelian_po = $pembelian_preorder->tgl_pembelian_po;
            $this->kode = $pembelian_preorder->kode;
            $this->supplier_id = $pembelian_preorder->supplier_id;
            $this->supplier_nama = $pembelian_preorder->supplier->nama;
            $this->user_id = $pembelian_preorder->user_id;
            $this->status = $pembelian_preorder->status;
            $this->total_barang = $pembelian_preorder->total_barang;
            $this->ppn = $pembelian_preorder->ppn;
            $this->biaya_lain = $pembelian_preorder->biaya_lain;
            $this->total_bayar = $pembelian_preorder->total_bayar;
            $this->keterangan = $pembelian_preorder->keterangan;
        }
    }

    public function rules()
    {
        return (new PembelianPreorderRequest())->rules();
    }

    public function store()
    {
        $data = $this->validate();
        (new PembelianPreorderService())->handleStore($data);
    }

    public function update()
    {
        $data = $this->validate();
        (new PembelianPreorderService())->handleUpdate($data);
    }

    public function render()
    {
        return view('livewire.pembelian.pembelian-pre-order-form');
    }
}
