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
        Schema::create('pembelian_po', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembelian_quotation_id')->nullable();
            $table->date('tgl_pembelian_po');
            $table->integer('tempo')->nullable();
            $table->integer('tgl_tempo')->nullable();
            $this->fieldPembelian($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian_po');
    }
};
