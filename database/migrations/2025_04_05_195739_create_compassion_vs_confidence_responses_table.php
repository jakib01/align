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
        Schema::create('compassion_vs_confidence_responses', function (Blueprint $table) {
                $table->id();
        $table->unsignedBigInteger('candidate_id');
        $table->unsignedBigInteger('question_id');
        $table->enum('response', ['strongly_agree', 'agree', 'neutral', 'disagree', 'strongly_disagree']);
        $table->integer('compassion_score');
        $table->integer('confidence_score');
        $table->timestamps();

        $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        $table->foreign('question_id')->references('id')->on('compassion_vs_confidence_questions')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compassion_vs_confidence_responses');
    }
};
