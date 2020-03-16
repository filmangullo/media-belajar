<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdOnKelasMataPelajaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('kelas_mata_pelajarans', function (Blueprint $table) {
          $table->unsignedBigInteger('user_id')->nullable()->after('instansi_id');

          $table->foreign('user_id')
                ->references('id')->on('users')
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
        //
    }
}
