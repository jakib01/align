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
        Schema::create('resilience_vs_sensitivity_questions', function (Blueprint $table) {
            $table->id();
            $table->text('statement');
            $table->integer('strongly_agree_resilience');
            $table->integer('strongly_agree_sensitivity');
            $table->integer('agree_resilience');
            $table->integer('agree_sensitivity');
            $table->integer('neutral_resilience');
            $table->integer('neutral_sensitivity');
            $table->integer('disagree_resilience');
            $table->integer('disagree_sensitivity');
            $table->integer('strongly_disagree_resilience');
            $table->integer('strongly_disagree_sensitivity');
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
        Schema::dropIfExists('resilience_vs_sensitivity_questions');
    }
};
