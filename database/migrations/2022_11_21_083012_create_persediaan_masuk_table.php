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
        Schema::create('persediaan_masuk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persedianable_masuk_id');
            $table->string('persediaanable_masuk_type');
            $this->fieldPersediaanTransaksi($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persediaan_masuk');
    }
};
