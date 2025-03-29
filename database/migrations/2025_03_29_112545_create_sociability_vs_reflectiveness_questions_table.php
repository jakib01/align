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
        Schema::create('sociability_vs_reflectiveness_questions', function (Blueprint $table) {
            $table->id();
            $table->text('statement');
            $table->integer('strongly_agree_sociability');
            $table->integer('strongly_agree_reflectiveness');
            $table->integer('agree_sociability');
            $table->integer('agree_reflectiveness');
            $table->integer('neutral_sociability');
            $table->integer('neutral_reflectiveness');
            $table->integer('disagree_sociability');
            $table->integer('disagree_reflectiveness');
            $table->integer('strongly_disagree_sociability');
            $table->integer('strongly_disagree_reflectiveness');
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
        Schema::dropIfExists('sociability_vs_reflectiveness_questions');
    }
};
