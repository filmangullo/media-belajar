<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumTugasKumpulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_tugas_kumpuls', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('forum_id');
          $table->unsignedBigInteger('user_id');
          $table->text('tugas');
          $table->text('file')->nullable();
          $table->string('extension_file')->nullable();
          $table->timestamps();
          $table->softDeletes();

          $table->foreign('forum_id')
                ->references('id')->on('forums')
                ->onDelete('cascade');

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
        Schema::dropIfExists('forum_tugas_kumpuls');
    }
}
