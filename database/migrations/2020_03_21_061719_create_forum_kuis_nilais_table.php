<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumKuisNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_kuis_nilais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('forum_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('nilai')->default('0')->nullable();
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('forum_kuis_nilais');
    }
}
