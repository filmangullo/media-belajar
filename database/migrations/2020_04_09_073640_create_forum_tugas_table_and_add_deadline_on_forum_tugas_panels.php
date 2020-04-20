<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumTugasTableAndAddDeadlineOnForumTugasPanels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('forum_tugas', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('forum_id');
          $table->unsignedBigInteger('user_id');
          $table->text('tugas');
          $table->text('file')->nullable()->after('tugas')->nullable();
          $table->string('extension_file')->after('file')->nullable();
          $table->timestamps();
          $table->softDeletes();

          $table->foreign('forum_id')
                ->references('id')->on('forums')
                ->onDelete('cascade');

          $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
      });

      Schema::table('forum_tugas_panels', function (Blueprint $table) {
          $table->dateTime('deadline')->nullable()->after('open_tugas');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_tugas_table_and_add_deadline_on_forum_tugas_panels');
    }
}
