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
        Schema::create('resilience_vs_sensitivity_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('question_id');
            $table->enum('response', ['strongly_agree', 'agree', 'neutral', 'disagree', 'strongly_disagree']);
            $table->integer('resilience_score');
            $table->integer('sensitivity_score');
            $table->timestamps();

            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('resilience_vs_sensitivity_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resilience_vs_sensitivity_responses');
    }
};
