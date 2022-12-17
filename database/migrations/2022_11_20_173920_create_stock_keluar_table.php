<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use App\Mine\SubMigration\MigrationTransaksiTrait;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_keluar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stockable_keluar_id')->nullable();
            $table->string('stockable_keluar_type', 100)->nullable();
            $table->date('tgl_masuk');
            $this->fieldTransaksiStock($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_keluar');
    }
};
