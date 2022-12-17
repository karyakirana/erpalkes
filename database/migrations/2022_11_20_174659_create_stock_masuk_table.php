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
        Schema::create('stock_masuk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stockable_masuk_id')->nullable();
            $table->string('stockable_masuk_type', 100)->nullable();
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
        Schema::dropIfExists('stock_masuk');
    }
};
