<?php

namespace App\Http\Livewire\Persediaan;

use App\Models\Persediaan\PersediaanAwal;
use Livewire\Component;

class PersediaanAwalDetailModal extends Component
{
    protected $listeners = [
        'loadDetail',
        'resetForm'
    ];

    public $tgl_persediaan_awal;
    public $kode;
    public $kondisi;
    public $gudang_id, $gudang_nama;
    public $user_id, $user_nama;
    public $total_barang, $total_nominal;
    public $keterangan;

    public $dataDetail = [];

    public function resetForm()
    {
        $this->reset([
            'tgl_persediaan_awal',
            'kode',
            'kondisi',
            'gudang_id', 'gudang_nama',
            'user_id', 'user_nama',
            'total_barang', 'total_nominal',
            'keterangan',
            'dataDetail'
        ]);
    }

    public function loadDetail(PersediaanAwal $persediaanAwal)
    {
        $this->tgl_persediaan_awal = $persediaanAwal->tgl_persediaan_awal;
        $this->kode = $persediaanAwal->kode;
        $this->kondisi = $persediaanAwal->kondisi;
        $this->gudang_id = $persediaanAwal->gudang_id;
        $this->gudang_nama = $persediaanAwal->gudang->nama;
        $this->user_id = $persediaanAwal->user_id;
        $this->user_nama = $persediaanAwal->users->name;
        $this->total_barang = $persediaanAwal->total_barang;
        $this->total_nominal = $persediaanAwal->total_nominal;
        $this->keterangan = $persediaanAwal->keterangan;

        foreach ($persediaanAwal->persediaanAwalDetail as $item) {
            $this->dataDetail[] = [
                'produk_id' => $item->persediaan->produk_id,
                'produk_nama' => $item->persediaan->produk->nama_produk."\n"
                    .$item->persediaan->produk->produkSubKategori->nama_sub_kategori,
                'batch' => $item->batch,
                'tgl_expired' => $item->tgl_expired,
                'jumlah' => $item->jumlah,
                'harga' => $item->harga,
                'sub_total' => $item->sub_total
            ];
        }
        $this->emit('detailModalShow');
    }
    public function render()
    {
        return view('livewire.persediaan.persediaan-awal-detail-modal');
    }
}
