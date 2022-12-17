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
        Schema::create('stock_keluar_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stock_keluar_id');
            $this->fieldTransaksiStockDetail($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_keluar_detail');
    }
};
