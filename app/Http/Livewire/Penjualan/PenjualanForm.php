<?php

namespace App\Http\Livewire\Penjualan;

use App\Mine\SubPenjualan\PenjualanRepository;
use Livewire\Component;

class PenjualanForm extends Component
{

    public $penjualan_id;
    public $active_cash;
    public $kode;
    public $penjualan_quotation_id;
    public $customer_id;
    public $sales_id;
    public $user_id;
    public $jenis_penjualan;
    public $status_invoice;
    public $tgl_nota;
    public $tgl_tempo;
    public $total_barang;
    public $total_ppn;
    public $total_biaya_lain;
    public $total_bayar;
    public $keterangan;
    public $print;

    public $update = false;

    protected $listeners = [];

    protected $rules = [
        'customer_id'=>'required',
        'sales_id'=>'required',
        'user_id'=>'required',
    ];

    public function mount($penjualan_id = null)
    {
        if ($penjualan_id){
            $this->update = true;
            $penjualan = PenjualanRepository::find($penjualan_id);
            $this->kode = $penjualan->kode;
            $this->customer_id = $penjualan->customer_id;
            $this->penjualan_quotation_id = $penjualan->penjualan_quotation_id;
            $this->sales_id = $penjualan->sales_id;
            $this->user_id = $penjualan->user_id;
            $this->status_invoice = $penjualan->status_invoice;
            $this->tgl_nota = $penjualan->tgl_nota;
            $this->tgl_tempo = $penjualan->tgl_tempo;
            $this->total_barang = $penjualan->total_barang;
            $this->total_ppn = $penjualan->total_ppn;
            $this->total_biaya_lain = $penjualan->total_biaya_lain;
            $this->total_bayar = $penjualan->total_bayar;
            $this->print = $penjualan->print;
            $this->keterangan = $penjualan->keterangan;
        }
    }

    protected function kode()
    {
        $penjualan = PenjualanRepository::latest('kode')->first();
        if (!$penjualan){
            $num = 1;
        } else {
            $lastNum = (int) $penjualan->last_num_master;
            $num = $lastNum + 1;
        }
        return "E".sprintf("%05s", $num);
    }

    public function store()
    {
        $this->validate();
        PenjualanRepository::create([
            'kode' => $this->kode(),
            'customer_id' => $this->customer_id,
            'tgl_nota' => $this->tgl_nota,
            'sales_id' => $this->sales_id,
            'user_id' => $this->user_id,
            'status_invoice' => $this->status_invoice,
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
        $penjualan = PenjualanRepository::find($this->penjualan_id);
        $penjualan->update([
            'tgl_nota' => $this->tgl_nota,
            'customer_id' => $this->customer_id,
            'sales_id' => $this->sales_id,
            'user_id' => $this->user_id,
            'status_invoice' => $this->status_invoice,
            'total_bayar'=>$this->total_bayar,
            'total_biaya_lain'=>$this->total_biaya_lain,
            'print'=>$this->print,
            'keterangan' => $this->keterangan,
        ]);
        // redirect
        session()->flash('message', 'Data '.$this->customer_id.' sudah diupdate.');
        return redirect()->to(route('penjualan'));
    }

    public function render()
    {
        return view('livewire.penjualan.penjualan-form');
    }
}
