<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumDeskripsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_deskripsis', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('forum_id');
          $table->text('deskripsi');
          $table->timestamps();
          $table->softDeletes();

          $table->foreign('forum_id')
                ->references('id')->on('forums')
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
        Schema::dropIfExists('forum_deskripsis');
    }
}
