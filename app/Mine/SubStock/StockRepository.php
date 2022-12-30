<?php namespace App\Mine\SubStock;

use App\Models\Stock\Stock;

class StockRepository
{
    public $active_cash;
    public $kondisi;
    public $gudang_id;
    public $stock_id;
    public $produk_id;
    public $batch;
    public $tgl_expired;
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
            $this->jumlah = $dataDetail['jumlah'];
        }

        if (is_object($dataDetail)){
            $this->stock_id = $dataDetail->stock_id ?? null;
            $this->produk_id = $dataDetail->produk_id ?? $dataDetail->persediaan->produk_id ?? null;
            $this->batch = $dataDetail->batch;
            $this->tgl_expired = $dataDetail->tgl_expired;
            $this->jumlah = $dataDetail->jumlah;
        }
    }

    public static function build(...$params)
    {
        return new static(...$params);
    }

    public static function builder()
    {
        return Stock::query();
    }

    public function baseQuery()
    {
        return Stock::where('active_cash', session('ClosedCash'))
            ->where('kondisi', $this->kondisi)
            ->where('gudang_id', $this->gudang_id)
            ->where('produk_id', $this->produk_id)
            ->where('batch', $this->batch)
            ->where('tgl_expired', $this->tgl_expired);
    }

    public function check()
    {
        return $this->baseQuery()->exists();
    }

    /**
     * @return Stock
     */
    public function create()
    {
        return Stock::create([
            'active_cash' => $this->active_cash,
            'gudang_id' => $this->gudang_id,
            'kondisi' => $this->kondisi,
            'produk_id' => $this->produk_id,
            'batch' => $this->batch,
            'tgl_expired' => $this->tgl_expired,
            $this->field => $this->jumlah,
            'stock_saldo' => ($this->field == 'stock_keluar') ? 0 - $this->jumlah : $this->jumlah
        ]);
    }

    /**
     * @return Stock
     */
    public function addStockIn()
    {
        if ($this->check()){
            $stock = $this->baseQuery()->first();
            $stock->update([
                $this->field => \DB::raw($this->field." + ".$this->jumlah),
                'stock_saldo' => \DB::raw("stock_saldo + ".$this->jumlah),
            ]);
            return $stock;
        }
        return $this->create();
    }

    /**
     * @return Stock
     */
    public function rollbackStockIn()
    {
        $stock = Stock::find($this->stock_id);
        $stock->update([
            $this->field => \DB::raw($this->field." - ".$this->jumlah),
            'stock_saldo' => \DB::raw("stock_saldo - ".$this->jumlah),
        ]);
        return $stock;
    }

    /**
     * @return Stock
     */
    public function addStockOut()
    {
        if ($this->check()){
            $stock = $this->baseQuery()->first();
            $stock->update([
                $this->field => \DB::raw($this->field." + ".$this->jumlah),
                'stock_saldo' => \DB::raw("stock_saldo - ".$this->jumlah),
            ]);
            return $stock->id;
        }
        return $this->create()->id;
    }

    /**
     * @return Stock
     */
    public function rollbackStockOut()
    {
        $stock = Stock::find($this->stock_id);
        $stock->update([
            $this->field => \DB::raw($this->field." - ".$this->jumlah),
            'stock_saldo' => \DB::raw("stock_saldo + ".$this->jumlah),
        ]);
        return $stock;
    }
}
