<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumKuisPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_kuis_panels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('forum_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('open_kuis')->default(false)->nullable();
            $table->integer('open_soal')->default('10')->nullable();
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
        Schema::dropIfExists('forum_kuis_panels');
    }
}
