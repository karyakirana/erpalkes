<?php namespace App\Mine\SubPersediaan;

use App\Models\Penjualan\Penjualan;
use App\Models\Persediaan\PersediaanKeluar;

class PersediaanKeluarRepository
{
    public static function kode($kondisi = 'baik')
    {
        $query = PersediaanKeluar::query()
            ->where('active_cash', session('ClosedCash'))
            ->where('kondisi', $kondisi)
            ->latest('kode');

        $kodeKondisi = ($kondisi == 'baik') ? 'PK' : 'PKR';

        // check last num
        if ($query->doesntExist()){
            return "0001/{$kodeKondisi}/".date('Y');
        }

        $num = (int) $query->first()->last_num_trans + 1;
        return sprintf("%04s", $num)."/{$kodeKondisi}/".date('Y');
    }

    public static function storeFromPenjualan(Penjualan $penjualan, $data)
    {
        $persediaanKeluar = PersediaanKeluar::create([
            'persedianable_keluar_id' => $penjualan->id,
            'persediaanable_keluar_type' => $penjualan::class,
            'active_cash' => $penjualan->active_cash,
            'kode' => self::kode(),
            'kondisi' => 'baik',
            'gudang_id' => $data['gudang_id'],
            'user_id' => $penjualan->user_id,
            'total_barang' => $penjualan->total_barang,
            'total_nominal' => 0,
            'keterangan' => $penjualan->keterangan
        ]);

        return self::storeDetailFromPenjualan($data, $persediaanKeluar);
    }

    public static function updateFromPenjualan(Penjualan $penjualan, $data)
    {
        $persediaanKeluar = $penjualan->persediaanKeluar()->first();
        $persediaanKeluar->update([
            'gudang_id' => $data['gudang_id'],
            'user_id' => $penjualan->user_id,
            'total_barang' => $penjualan->total_barang,
            'total_nominal' => 0,
            'keterangan' => $penjualan->keterangan
        ]);
        return self::storeDetailFromPenjualan($data, $persediaanKeluar);
    }

    /**
     * @param $data
     * @param PersediaanKeluar $persediaanKeluar
     * @return PersediaanKeluar
     */
    protected static function storeDetailFromPenjualan($data, PersediaanKeluar $persediaanKeluar): PersediaanKeluar
    {
        $subTotal = 0;

        foreach ($data['dataDetail'] as $item) {
            // get persediaan
            $getPersediaan = PersediaanGetOut::getOut(
                $data['gudang_id'],
                $item['produk_id'],
                $item['jumlah'],
                'baik',
                $item['tgl_expired'] ?? null
            );
            // update persediaan
            foreach ($getPersediaan as $row) {
                $persediaan = PersediaanGetOut::updateFromOut(
                    $row['persediaan_id'],
                    $row['jumlah']
                );
                $dataRow = array_merge(['persediaan_id' => $persediaan->id], $row);
                $persediaanKeluar->persediaanKeluarDetail()->create($dataRow);
                $subTotal += $row['sub_total'];
            }
        }
        $persediaanKeluar->update([
            'total_barang' => $subTotal
        ]);
        return $persediaanKeluar->refresh();
    }

    public static function destroyDetailFromPenjualan(Penjualan $penjualan)
    {
        $persediaanKeluar = $penjualan->persediaanKeluar()->first();
        $persediaanKeluarDetail = $persediaanKeluar->persediaanKeluarDetail;
        foreach ($persediaanKeluarDetail as $item) {
            PersediaanGetOut::rollbackFromOut($item->persediaan_id, $item->jumlah);
        }
        $persediaanKeluarDetail->delete();
        return $persediaanKeluar->refresh();
    }

    public static function destroyFromPenjualan(Penjualan $penjualan)
    {
        return self::destroyDetailFromPenjualan($penjualan)->delete();
    }
}
