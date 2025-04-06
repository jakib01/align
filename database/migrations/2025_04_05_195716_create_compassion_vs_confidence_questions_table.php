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
        Schema::create('compassion_vs_confidence_questions', function (Blueprint $table) {
            $table->id();
            $table->text('statement');
            $table->integer('strongly_agree_compassion');
            $table->integer('strongly_agree_confidence');
            $table->integer('agree_compassion');
            $table->integer('agree_confidence');
            $table->integer('neutral_compassion');
            $table->integer('neutral_confidence');
            $table->integer('disagree_compassion');
            $table->integer('disagree_confidence');
            $table->integer('strongly_disagree_compassion');
            $table->integer('strongly_disagree_confidence');
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
        Schema::dropIfExists('compassion_vs_confidence_questions');
    }
};
