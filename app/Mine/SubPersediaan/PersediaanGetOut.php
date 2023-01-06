<?php namespace App\Mine\SubPersediaan;

use App\Models\Persediaan\Persediaan;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PersediaanGetOut
{
    public static function getOut(
        $gudang_id,
        $produk_id,
        $jumlah,
        $kondisi = 'baik',
        $tgl_expired = null
    )
    {
        $query = Persediaan::where('active_cash', session('ClosedCash'))
            ->where('gudang_id', $gudang_id)
            ->where('produk_id', $produk_id)
            ->where('kondisi', $kondisi)
            ->oldest();

        if (! is_null($tgl_expired)){
            $query = $query->where('tgl_expired', $tgl_expired)
                ->oldest('tgl_expired');
        }

        // dd($query->sum('stock_saldo'));

        if ($query->sum('stock_saldo') < $jumlah){
            throw new ModelNotFoundException('Stock Kurang dari Permintaan');
        }



        $data = $query->get();
        $countData = $query->count();
        $senData = [];
        for ($x = 0; $x < $countData; $x++){
            $row = $data[$x];

            if ($jumlah < $row->stock_saldo){
                $senData[] = [
                    'persediaan_id' => $row->id,
                    'produk_id' => $row->produk_id,
                    'jumlah' => $jumlah,
                    'harga' => $row->harga,
                    'sub_total' => (int) $jumlah * $row->harga
                ];
                break;
            }
            $senData[] = [
                'persediaan_id' => $row->id,
                'produk_id' => $row->produk_id,
                'jumlah' => $row->stock_saldo,
                'harga' => $row->harga,
                'sub_total' => (int) $jumlah * $row->harga
            ];
            $jumlah = $jumlah - $row->stock_saldo;
        }
        return $senData;
    }

    public static function updateFromOut($persediaan_id, $jumlah)
    {
        $persediaan = Persediaan::find($persediaan_id);
        $persediaan->update([
                'stock_keluar' => \DB::raw("stock_keluar + ".$jumlah),
                'stock_saldo' => \DB::raw("stock_saldo - ".$jumlah),
            ]);
        return $persediaan->refresh();
    }

    public static function rollbackFromOut($persediaan_id, $jumlah)
    {
        $persediaan = Persediaan::find($persediaan_id);
        $persediaan->update([
            'stock_keluar' => \DB::raw("stock_keluar - ".$jumlah),
            'stock_saldo' => \DB::raw("stock_saldo + ".$jumlah),
        ]);
        return $persediaan->refresh();
    }
}
