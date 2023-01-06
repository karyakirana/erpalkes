<?php namespace App\Mine\SubMigration;

use Illuminate\Database\Schema\Blueprint;

trait MigrationTransaksiTrait
{
    public function fieldTransaksiStock(Blueprint $table)
    {
        $table->string('active_cash', 100);
        $table->string('kode', 20);
        $table->string('kondisi', 20);
        $table->string('status');
        $table->unsignedBigInteger('gudang_id');
        $table->unsignedBigInteger('user_id');
        $table->bigInteger('total_barang');
        $table->text('keterangan')->nullable();
        $table->timestamps();
        $table->softDeletes();
    }

    public function fieldTransaksiStockDetail(Blueprint $table)
    {
        $table->unsignedBigInteger('stock_id');
        $table->bigInteger('jumlah');
    }

    public function fieldPenjualan(Blueprint $table)
    {
        $table->string('active_cash', 100);
        $table->string('kode', 20);
        $table->string('tipe', 20);
        $table->unsignedBigInteger('customer_id');
        $table->unsignedBigInteger('sales_id');
        $table->unsignedBigInteger('user_id'); // pembuat atau pengedit
        $table->string('status', 20); // approved, cancel, pending
        $table->bigInteger('total_barang');
        $table->bigInteger('total_ppn')->nullable();
        $table->bigInteger('total_biaya_lain')->nullable();
        $table->bigInteger('total_bayar');
        $table->text('keterangan')->nullable();
        $table->timestamps();
        $table->softDeletes(); // softdeletes
    }

    public function fieldPenjualanDetail(Blueprint $table)
    {
        $table->unsignedBigInteger('produk_id');
        $table->string('kemasan');
        $table->bigInteger('harga');
        $table->bigInteger('jumlah');
        $table->float('diskon', 3);
        $table->bigInteger('sub_total');
    }

    public function fieldStock(Blueprint $table)
    {
        $table->bigInteger('stock_awal')->nullable()->default(0);
        $table->bigInteger('stock_masuk')->nullable()->default(0);
        $table->bigInteger('stock_keluar')->nullable()->default(0);
        $table->bigInteger('stock_saldo')->nullable()->default(0);
        $table->bigInteger('stock_saldo_koreksi')->nullable()->default(0);
        $table->bigInteger('stock_saldo_lost')->nullable()->default(0);
    }

    public function fieldPembelian(Blueprint $table)
    {
        $table->string('active_cash', 100);
        $table->string('kode', 20);
        $table->unsignedBigInteger('supplier_id');
        $table->unsignedBigInteger('gudang_id');
        $table->unsignedBigInteger('user_id');
        $table->string('status', 20);
        $table->bigInteger('total_barang');
        $table->bigInteger('ppn')->nullable();
        $table->bigInteger('biaya_lain')->nullable();
        $table->bigInteger('total_bayar');
        $table->text('keterangan')->nullable();
        $table->timestamps();
        $table->softDeletes();
    }

    public function fieldPembelianDetail(Blueprint $table)
    {
        $table->unsignedBigInteger('produk_id');
        $table->bigInteger('harga');
        $table->bigInteger('jumlah');
        $table->float('diskon', 3);
        $table->bigInteger('sub_total');
    }

    public function fieldPersediaanTransaksi(Blueprint $table)
    {
        $table->string('active_cash');
        $table->string('kode');
        $table->string('kondisi', 10);
        $table->unsignedBigInteger('gudang_id');
        $table->unsignedBigInteger('user_id');
        $table->bigInteger('total_barang');
        $table->bigInteger('total_nominal');
        $table->text('keterangan')->nullable();
        $table->timestamps();
        $table->softDeletes();
    }

    public function fieldPersediaanDetail(Blueprint $table)
    {
        $table->unsignedBigInteger('persediaan_id');
        $table->string('batch')->nullable();
        $table->date('tgl_expired')->nullable();
        $table->bigInteger('jumlah');
        $table->bigInteger('harga');
        $table->bigInteger('sub_total');
    }
}
