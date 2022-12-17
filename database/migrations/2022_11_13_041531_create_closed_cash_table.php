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
        Schema::create('closed_cash', function (Blueprint $table) {
            $table->id();
            $table->string('active_cash', 100)->unique();
            $table->string('closed_cash', 100)->nullable();
            $table->dateTime('started');
            $table->dateTime('closed')->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('closed_cash');
    }
};
