<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_dimuka', function (Blueprint $table) {
            $table->id();
            $table->string('tipe'); // KSO atau di muka
            $table->unsignedBigInteger('penjualan_id');
            $table->string('status'); // belum or sebagian or selesai
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan_dimuka');
    }
};
