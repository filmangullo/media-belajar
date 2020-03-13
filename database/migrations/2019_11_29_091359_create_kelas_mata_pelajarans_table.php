<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasMataPelajaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_mata_pelajarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('instansi_id');
            $table->string('nama');
            $table->text('keterangan');
            $table->text('enroll_key');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('instansi_id')
                  ->references('id')->on('instansis')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas_mata_pelajarans');
    }
}
