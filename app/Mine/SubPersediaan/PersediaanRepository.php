<?php namespace App\Mine\SubPersediaan;

use App\Models\Persediaan\Persediaan;

class PersediaanRepository
{
    public $active_cash;
    public $kondisi;
    public $gudang_id;
    public $produk_id;
    public $batch;
    public $tgl_expired;
    public $harga;
    public $field;
    public $jumlah;

    public function __construct($active_cash, $kondisi, $gudang_id, $field, $dataDetail)
    {
        $this->active_cash = $active_cash;
        $this->gudang_id = $gudang_id;
        $this->kondisi = $kondisi;
        $this->field = $field;

        if (is_array($dataDetail)){
            $this->produk_id = $dataDetail['produk_id'];
            $this->batch = $dataDetail['batch'];
            $this->tgl_expired = $dataDetail['tgl_expired'];
            $this->harga = $dataDetail['harga'];
            $this->jumlah = $dataDetail['jumlah'];
        }

        if (is_object($dataDetail)){
            $this->produk_id = $dataDetail->produk_id;
            $this->batch = $dataDetail->batch;
            $this->tgl_expired = $dataDetail->tgl_expired;
            $this->harga = $dataDetail->harga;
            $this->jumlah = $dataDetail->jumlah;
        }
    }

    public static function build(...$params)
    {
        return new static(...$params);
    }

    public function baseQuery()
    {
        return Persediaan::where('active_cash', $this->active_cash)
            ->where('kondisi', $this->kondisi)
            ->where('gudang_id', $this->gudang_id)
            ->where('produk_id', $this->produk_id)
            ->where('batch', $this->batch)
            ->where('tgl_expired', $this->tgl_expired)
            ->where('harga', $this->harga);
    }

    public function check()
    {
        return $this->baseQuery()->exists();
    }

    public function create()
    {
        return Persediaan::create([
            'active_cash' => $this->active_cash,
            'kondisi' => $this->kondisi,
            'gudang_id' => $this->gudang_id,
            'produk_id' => $this->produk_id,
            'batch' => $this->batch,
            'tgl_expired' => $this->tgl_expired,
            'harga' => $this->harga,
            $this->field => $this->jumlah,
            'stock_saldo' => ($this->field == 'stock_keluar') ? 0 - $this->jumlah : $this->jumlah
        ]);
    }

    public function addPersedianIn()
    {
        if ($this->check()){
            $persediaan = $this->baseQuery()->first();
            $persediaan->update([
                $this->field => \DB::raw($this->field." + ".$this->jumlah),
                'stock_saldo' => \DB::raw("stock_saldo + ".$this->jumlah),
            ]);
            return $persediaan->refresh();
        }
        return $this->create();
    }

    public function rollbackPersediaanIn()
    {
        $persediaan = $this->baseQuery()->first();
        $persediaan->update([
            $this->field => \DB::raw($this->field." - ".$this->jumlah),
            'stock_saldo' => \DB::raw("stock_saldo - ".$this->jumlah),
        ]);
        return $persediaan;
    }

    public static function rollbackStaticPersediaanIn($persediaan_id, $jumlah, $field)
    {
        return Persediaan::find($persediaan_id)
            ->update([
                $field => \DB::raw($field." - ".$jumlah),
                'stock_saldo' => \DB::raw("stock_saldo - ".$jumlah),
            ]);
    }

    public function addPersediaanOut()
    {
        if ($this->check()){
            $persediaan = $this->baseQuery()->first();
            $persediaan->update([
                $this->field => \DB::raw($this->field." + ".$this->jumlah),
                'stock_saldo' => \DB::raw("stock_saldo - ".$this->jumlah),
            ]);
            return $persediaan->refresh();
        }
        return $this->create();
    }

    public function rollbackPersediaanOut()
    {
        $stock = $this->baseQuery()->first();
        $stock->update([
            $this->field => \DB::raw($this->field." - ".$this->jumlah),
            'stock_saldo' => \DB::raw("stock_saldo + ".$this->jumlah),
        ]);
        return $stock;
    }
}
