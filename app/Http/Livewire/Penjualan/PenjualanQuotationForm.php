<?php

namespace App\Http\Livewire\Penjualan;

use App\Models\Penjualan\PenjualanQuotation;
use Livewire\Component;

class PenjualanQuotationForm extends Component
{
    public $penjualan_quotation_id;
    public $active_cash;
    public $kode;
    public $customer_id;
    public $sales_id;
    public $user_id;
    public $status_quotation;
    public $tgl_quotation;
    public $total_barang;
    public $total_bayar;
    public $total_ppn;
    public $total_biaya_lain;
    public $keterangan;
    public $print;

    public $update = false;

    protected $listeners = [];

    protected $rules = [
        'customer_id'=>'required',
        'sales_id'=>'required',
        'user_id'=>'required',
    ];

    public function mount($penjualan_quotation_id = null)
    {
        if ($penjualan_quotation_id){
            $this->update = true;
            $penjualan_quotation = PenjualanQuotation::find($penjualan_quotation_id);
            $this->kode = $penjualan_quotation->kode;
            $this->customer_id = $penjualan_quotation->customer_id;
            $this->sales_id = $penjualan_quotation->sales_id;
            $this->user_id = $penjualan_quotation->user_id;
            $this->status_quotation = $penjualan_quotation->status_quotation;
            $this->tgl_quotation = $penjualan_quotation->tgl_quotation;
            $this->total_barang = $penjualan_quotation->total_barang;
            $this->total_ppn = $penjualan_quotation->total_ppn;
            $this->total_biaya_lain = $penjualan_quotation->total_biaya_lain;
            $this->total_bayar = $penjualan_quotation->total_bayar;
            $this->print = $penjualan_quotation->print;
            $this->keterangan = $penjualan_quotation->keterangan;
        }
    }

    protected function kode()
    {
        $penjualan_quotation = PenjualanQuotation::latest('kode')->first();
        if (!$penjualan_quotation){
            $num = 1;
        } else {
            $lastNum = (int) $penjualan_quotation->last_num_master;
            $num = $lastNum + 1;
        }
        return "E".sprintf("%05s", $num);
    }

    public function store()
    {
        $this->validate();
        PenjualanQuotation::create([
            'kode' => $this->kode(),
            'tgl_quotation' => $this->tgl_quotation,
            'customer_id' => $this->customer_id,
            'sales_id' => $this->sales_id,
            'user_id' => $this->user_id,
            'status_quotation' => $this->status_quotation,
            'total_bayar'=>$this->total_bayar,
            'total_biaya_lain'=>$this->total_biaya_lain,
            'print'=>$this->print,
            'keterangan' => $this->keterangan,
        ]);
        // redirect
        session()->flash('message', 'Data '.$this->nama_pegawai.' sudah disimpan.');
        return redirect()->to(route('pegawai'));
    }

    public function update()
    {
        $this->validate();
        PenjualanQuotation::find($this->penjualan_quotation_id);
        $penjualan_quotation->update([
            'tgl_quotation' => $this->tgl_quotation,
            'customer_id' => $this->customer_id,
            'sales_id' => $this->sales_id,
            'user_id' => $this->user_id,
            'status_quotation' => $this->status_quotation,
            'total_bayar'=>$this->total_bayar,
            'total_biaya_lain'=>$this->total_biaya_lain,
            'print'=>$this->print,
            'keterangan' => $this->keterangan,
        ]);
        // redirect
        session()->flash('message', 'Data '.$this->customer_id.' sudah diupdate.');
        return redirect()->to(route('penjualan.quotation'));
    }

    public function render()
    {
        return view('livewire.penjualan.penjualan-quotation-form');
    }
}
