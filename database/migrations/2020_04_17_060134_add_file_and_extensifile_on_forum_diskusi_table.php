<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFileAndExtensifileOnForumDiskusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forum_diskusis', function (Blueprint $table) {

            $table->text('file')->nullable()->after('diskusi')->nullable();
            $table->string('extension_file')->after('file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forum_diskusis', function (Blueprint $table) {
            //
        });
    }
}
