<?php

namespace App\Http\Livewire\Pembelian;

use App\Models\Pembelian\PembelianQuotation;
use Livewire\Component;

class PembelianQuotaionForm extends Component
{
    public $pembelian_quotation_id;
    public $active_cash;
    public $kode;
    public $supplier_id;
    public $user_id;
    public $status;
    public $tgl_pembelian_quotation;
    public $total_barang;
    public $total_bayar;
    public $ppn;
    public $biaya_lain;
    public $keterangan;
    public $print;

    public $update = false;

    protected $listeners = [];

    protected $rules = [
      'supplier_id'=>'required',
      'tgl_pembelian_quotation'=>'required',
    ];

    public function mount($pembelian_quotation_id = null)
    {
        if($pembelian_quotation_id){
            $this->update = true;
            $pembelian_quotation = PembelianQuotation::find($pembelian_quotation_id);
            $this->kode = $pembelian_quotation->kode;
            $this->supplier_id = $pembelian_quotation->supplier_id;
            $this->user_id = $pembelian_quotation->user_id;
            $this->status = $pembelian_quotation->status;
            $this->tgl_pembelian_quotation = $pembelian_quotation->tgl_pembelian_quotation;
            $this->total_barang = $pembelian_quotation->total_barang;
            $this->ppn = $pembelian_quotation->ppn;
            $this->biaya_lain = $pembelian_quotation->biaya_lain;
            $this->total_bayar = $pembelian_quotation->total_bayar;
            $this->print = $pembelian_quotation->print;
            $this->keterangan = $pembelian_quotation->keterangan;
        }
    }

    protected function kode()
    {
        $pembelian_quotation = PembelianQuotation::latest('kode')->first;
        if (!$pembelian_quotation){
            $num = 1;
        } else {
            $lastNum = (int) $pembelian_quotation->last_num_master;
            $num = $lastNum + 1;
        }
        return "E".sprintf("%05s", $num);
    }
    public function store()
    {
        $this->validate();
        PembelianQuotation::create([
            'kode' => $this->kode(),
            'tgl_pembelian_quotation' => $this->tgl_pembelian_quotation,
            'supplier_id' => $this->supplier_id,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'status' => $this->status,
            'total_bayar' => $this->total_bayar,
            'biaya_lain' => $this->biaya_lain,
            'print' => $this->print,
            'keterangan' => $this->keterangan,
        ]);
    // redirect
        session()->flash('message', 'Data '.$this->nama_pegawai.' sudah disimpan.');
        return redirect()->to(route('pegawai'));
    }
    public function update()
    {
        $this->validate();
        $pembelian_quotation = PembelianQuotation::find($this->pembelian_quotation_id);
        $pembelian_quotation->update([
            'tgl_pembelian_quotation' => $this->tgl_pembelian_quotation,
            'supplier_id' => $this->supplier_id,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'status' => $this->status,
            'total_bayar' => $this->total_bayar,
            'biaya_lain' => $this->biaya_lain,
            'print' => $this->print,
            'keterangan' => $this->keterangan,
        ]);
        // redirect
        session()->flash('message', 'Data '.$this->supplier_id.' sudah diupdate.');
        return redirect()->to(route('pembelian.quotation'));
    }

    public function render()
    {
        return view('livewire.pembelian.pembelian-quotaion-form');
    }
}
