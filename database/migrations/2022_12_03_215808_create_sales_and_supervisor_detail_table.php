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
        Schema::create('sales_and_supervisor_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sales_supervisor_id');
            $table->unsignedBigInteger('sales_id');
            $table->char('kota', 4);
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
        Schema::dropIfExists('sales_and_supervisor_detail');
    }
};
