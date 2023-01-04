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
        Schema::create('penjualan_preorder', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penjualan_quotation_id');
            $table->date('tgl_preorder');
            $table->integer('tempo');
            $table->date('tgl_tempo')->nullable();
            $this->fieldPenjualan($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan_preorder');
    }
};
