<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddedNilaiForumTugasKumpulsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //forum_tugas_kumpuls
        Schema::table('forum_tugas_kumpuls', function (Blueprint $table) {
            $table->integer('nilai')->nullable()->after('extension_file');
            $table->text('catatan_pengajar')->nullable()->after('nilai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forum_tugas_kumpuls', function (Blueprint $table) {
            //
        });
    }
}
