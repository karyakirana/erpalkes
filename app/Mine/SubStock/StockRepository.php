<?php namespace App\Mine\SubStock;

use App\Models\Stock\Stock;

class StockRepository
{
    protected $active_cash;
    protected $produk_id;
    protected $field;
    protected $jumlah;
    protected $stock_saldo;
    protected $tgl_produksi;
    protected $batch;

    public function __construct(
        $produk_id,
        $field,
        $jumlah,
        $tgl_produksi = null,
        $batch = null,
    )
    {
        $this->active_cash = session('ClosedCash');
        $this->produk_id = $produk_id;
        $this->field = $field;
        $this->jumlah = $jumlah;
        $this->tgl_produksi = $tgl_produksi;
        $this->batch = $batch;

        $this->stock_saldo = 0;

        // keadaan stock saldo bertambah
        if ($field === 'stock_masuk' || $field === 'stock_awal' ){
            $this->stock_saldo = $jumlah;
        }

        // stock_keluar maka saldo berkurang
        if ($field === 'stock_keluar'){
            $this->stock_saldo = 0 - $jumlah;
        }
    }

    /**
     * @param $produkId
     * @param bool $activeCash
     * @return Stock[]|\LaravelIdea\Helper\App\Models\Stock\_IH_Stock_C
     */
    public static function getStockBYProdukId($produkId, bool $activeCash = true)
    {
        if (!$activeCash){
            return Stock::where('active_cash', session('ClosedCash'))
                ->where('produk_id', $produkId)
                ->get();
        }
        return Stock::where('produk_id', $produkId)->get();
    }

    public static function getStockByActiveCash()
    {
        //
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function baseQueryStock()
    {
        return Stock::query()->where('active_cash', session('ClosedCash'))
            ->where('produk_id', $this->produk_id)
            ->where('tgl_produksi', $this->tgl_produksi)
            ->where('batch', $this->batch);
    }

    /**
     * @return bool
     */
    protected function checkStock()
    {
        return $this->baseQueryStock()->exists();
    }

    /**
     * @return Stock
     */
    public function createStock()
    {
        return Stock::create([
            'active_cash' => $this->active_cash,
            'produk_id' => $this->produk_id,
            'tgl_produksi' => $this->tgl_produksi,
            'batch' => $this->batch,
            $this->field => $this->jumlah,
            'stock_saldo' => $this->stock_saldo
        ]);
    }

    public function addStockAwal()
    {
        if ($this->checkStock()){
            $this->baseQueryStock()
                ->update([
                    'stock_awal'=>\DB::raw('stock_awal + '.$this->jumlah),
                    'stock_saldo'=>\DB::raw('stock_saldo + '.$this->jumlah),
                ]);
        }
    }

    /**
     * @return Stock|int
     */
    public function addStockMasuk()
    {
        if ($this->checkStock()){
            return $this->baseQueryStock()
                ->update([
                    'stock_awal'=>\DB::raw('stock_awal + '.$this->jumlah),
                    'stock_saldo'=>\DB::raw('stock_saldo + '.$this->jumlah),
                ]);
        }
        return $this->createStock();
    }

    /**
     * @return Stock|int
     */
    public function addStockKeluar()
    {
        if ($this->checkStock()){
            return $this->baseQueryStock()
                ->update([
                    'stock_awal'=>\DB::raw('stock_keluar + '.$this->jumlah),
                    'stock_saldo'=>\DB::raw('stock_saldo - '.$this->jumlah),
                ]);
        }
        return $this->createStock();
    }

    /**
     * @return Stock|int
     */
    public function addStockSaldoKoreksi()
    {
        if ($this->checkStock()){
            return $this->baseQueryStock()
                ->update([
                    'stock_awal'=>\DB::raw('stock_saldo_koreksi + '.$this->jumlah),
                ]);
        }
        return $this->createStock();
    }
}
