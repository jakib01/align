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
        Schema::create('discipline_vs_adaptability_questions', function (Blueprint $table) {
            $table->id();
            $table->text('statement');
            $table->integer('strongly_agree_discipline');
            $table->integer('strongly_agree_adaptability');
            $table->integer('agree_discipline');
            $table->integer('agree_adaptability');
            $table->integer('neutral_discipline');
            $table->integer('neutral_adaptability');
            $table->integer('disagree_discipline');
            $table->integer('disagree_adaptability');
            $table->integer('strongly_disagree_discipline');
            $table->integer('strongly_disagree_adaptability');
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
        Schema::dropIfExists('discipline_vs_adaptability_questions');
    }
};
