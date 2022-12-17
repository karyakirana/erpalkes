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
        Schema::create('customer_cn', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10);
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('user_id');
            $table->string('penerima_cn', 50);
            $table->string('jabatan_cn', 20)->nullable();
            $table->string('unit_cn', 20)->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('customer_cn');
    }
};
