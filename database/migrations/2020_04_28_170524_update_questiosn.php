<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateQuestiosn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('questions', function(Blueprint $table) {
        //     // $table->dropForeign('questions_quiz_id_foreign');
        //     $table->integer('quiz_id')->unsigned();
        //     $table->foreign('quiz_id')
        //     ->references('id')->on('quizzes')
        //     ->onDelete('cascade');
        // });
        Schema::table('playeds', function(Blueprint $table) {
            $table->dropForeign('playeds_user_id_foreign');

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            $table->dropForeign('playeds_quiz_id_foreign');

            $table->foreign('quiz_id')
            ->references('id')->on('quizzes')
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
