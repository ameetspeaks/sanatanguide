<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('meditations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('category');
            $table->integer('duration')->comment('Duration in minutes');
            $table->string('featured_image')->nullable();
            $table->string('audio_file')->nullable();
            $table->string('video_file')->nullable();
            $table->text('benefits');
            $table->text('instructions');
            $table->enum('difficulty_level', ['beginner', 'intermediate', 'advanced']);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meditations');
    }
}; 