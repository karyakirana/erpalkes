<?php

namespace App\Http\Livewire\Pembelian;

use Livewire\Component;

class PembelianPreOrderForm extends Component
{
    public $po_id;
    public $pembelian_quotation_id;
    public $tgl_pembelian_po;
    public $kode;
    public $supplier_id;
    public $user_id;
    public $status;
    public $total_barang;
    public $total_ppn;
    public $total_biaya;
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
        return view('livewire.pembelian.pembelian-pre-order-form');
    }
}
