<?php

namespace App\Http\Livewire\Penjualan;

use Livewire\Component;

class PenjualanPreOrderForm extends Component
{
    public $po_id;
    public $penjualan_quotation_id;
    public $tgl_preorder;
    public $kode;
    public $tipe;
    public $customer_id;
    public $sales_id;
    public $user_id;
    public $status;
    public $total_barang;
    public $total_ppn;
    public $total_biaya_lain;
    public $total_bayar;
    public $keterangan;

    public $update = false;
    public $mode = 'create';

    public $dataDetail = [];
    public $index;
    public $produk_id, $produk_nama;
    public $harga;
    public $jumlah;
    public $diskon;
    public $sub_total;
    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    public function mount($po_id = null)
    {
//        $this->user_id = \Auth::id();
//        if ($po_id){
//            $this->mode = 'update';
//
//            $data = (new PreOrderService())->handleEdit($po_id);
//            $this->po_id = $data->id;
//            $this->tipe = $data->tipe;
//            $this->customer_id = $data->customer_id;
//            $this->customer_id = $data->customer_id;
//        }
    }

    public function resetForm()
    {

    }

    public function addLine()
    {

    }

    public function editLine($index)
    {

    }

    public function rules()
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function render()
    {
        return view('livewire.penjualan.pre-order-form');
    }
}
