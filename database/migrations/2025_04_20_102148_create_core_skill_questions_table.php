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
        Schema::create('core_skill_questions', function (Blueprint $table) {
            $table->id();
        $table->text('prompt');
        $table->string('skill')->nullable();
        $table->string('sub_skill')->nullable();
        $table->string('theme_tags')->nullable();
        $table->json('options');
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
        Schema::dropIfExists('core_skill_questions');
    }
};
