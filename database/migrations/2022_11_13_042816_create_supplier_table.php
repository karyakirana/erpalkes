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
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10);
            $table->string('status', 10);
            $table->string('nama', 50);
            $table->string('telepon', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('npwp', 20)->nullable();
            $table->text('alamat');
            $table->char('regencies_id', 4);
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier');
    }
};
