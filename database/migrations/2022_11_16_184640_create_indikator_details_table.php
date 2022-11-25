<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndikatorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indikator_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('indikator_id')->nullable(false);
            $table->string('nilai');
            $table->string('satuan');
            $table->year('tahun');
            $table->boolean('validasi');
            $table->boolean('verifikasi');
            $table->string('publish');
            $table->string('status');
            $table->string('catatan')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('indikator_id')->references('id')->on('indikators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indikator_details');
    }
}
