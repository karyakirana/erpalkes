<?php

use App\Mine\SubMigration\MigrationTransaksiTrait;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use MigrationTransaksiTrait;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penjualan_preorder_id')->nullable();
            $table->date('tgl_penjualan');
            $table->integer('tempo')->nullable();
            $table->date('tgl_tempo')->nullable();
            $table->string('active_cash', 100);
            $table->string('kode', 20);
            $table->string('tipe', 20); // non-kso, kso, kso-alat
            $table->string('nomor_kso', 20);
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
};
