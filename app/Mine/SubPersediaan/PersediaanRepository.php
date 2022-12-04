<?php namespace App\Mine\SubPersediaan;

use App\Models\Persediaan\Persediaan;

class PersediaanRepository
{
    protected $produk_id;
    protected $harga;
    protected $field;
    protected $jumlah;
    protected $tgl_expired;

    public function __construct($produk_id, $harga, $field, $jumlah, $tgl_expired = null)
    {
        $this->produk_id = $produk_id;
        $this->harga = $harga;
        $this->field = $field;
        $this->jumlah = $jumlah;
        $this->tgl_expired = $tgl_expired;
    }

    public static function build($produk_id, $harga, $field, $jumlah, $tgl_expired = null)
    {
        return new static($produk_id, $harga, $field, $jumlah, $tgl_expired = null);
    }

    /**
     * @return Persediaan
     */
    public function query()
    {
        $query = Persediaan::where('active_cash', session('ClosedCash'))
        ->where('produk_id', $this->produk_id)
        ->where('harga_dasar', $this->harga);
        if ($this->tgl_expired){
            return $query->where('tgl_expired', $this->tgl_expired);
        }
        return $query;
    }

    public function addPersediaan()
    {
        // check
        if ($this->query()->exists()){
            return $this->query()->update([
                $this->field => \DB::raw($this->field.' + '.$this->jumlah),
                'stock_saldo' => \DB::raw('stock_saldo + '.$this->jumlah),
            ]);
        }
        return $this->query()->create([
            'active_cash' => session('active_cash'),
            'produk_id' => $this->produk_id,
            'tgl_expired' => $this->tgl_expired,
            'harga_dasar' => $this->harga,
            $this->field => $this->jumlah,
            'stock_saldo' => $this->jumlah
        ]);
    }

    public function addPersediaanKeluar()
    {
        // check
        if ($this->query()->exists()){
            return $this->query()->update([
                $this->field => \DB::raw($this->field.' + '.$this->jumlah),
                'stock_saldo' => \DB::raw('stock_saldo - '.$this->jumlah),
            ]);
        }
        return $this->query()->create([
            'active_cash' => session('active_cash'),
            'produk_id' => $this->produk_id,
            'tgl_expired' => $this->tgl_expired,
            'harga_dasar' => $this->harga,
            $this->field => $this->jumlah,
            'stock_saldo' => 0 - $this->jumlah
        ]);
    }

    public function rollback()
    {
        return $this->query()->update([
            $this->field => \DB::raw($this->field.' - '.$this->jumlah),
            'stock_saldo' => \DB::raw('stock_saldo - '.$this->jumlah),
        ]);
    }

    public function rollbackKeluar()
    {
        return $this->query()->update([
            $this->field => \DB::raw($this->field.' - '.$this->jumlah),
            'stock_saldo' => \DB::raw('stock_saldo + '.$this->jumlah),
        ]);
    }
}
