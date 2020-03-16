<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiskusiCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskusi_comments', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('forum_id');
          $table->unsignedBigInteger('forum_diskusi_id');
          $table->unsignedBigInteger('user_id');
          $table->text('comment');
          $table->timestamps();
          $table->softDeletes();

          $table->foreign('forum_id')
                ->references('id')->on('forums')
                ->onDelete('cascade');

          $table->foreign('forum_diskusi_id')
                ->references('id')->on('forum_diskusis')
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
        Schema::dropIfExists('duskusi_comments');
    }
}
