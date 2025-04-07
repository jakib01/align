<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curiosity_vs_practicality_questions', function (Blueprint $table) {
            $table->id();
            $table->text('statement');
            $table->integer('strongly_agree_curiosity');
            $table->integer('strongly_agree_practicality');
            $table->integer('agree_curiosity');
            $table->integer('agree_practicality');
            $table->integer('neutral_curiosity');
            $table->integer('neutral_practicality');
            $table->integer('disagree_curiosity');
            $table->integer('disagree_practicality');
            $table->integer('strongly_disagree_curiosity');
            $table->integer('strongly_disagree_practicality');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curiosity_vs_practicality_questions');
    }
};
