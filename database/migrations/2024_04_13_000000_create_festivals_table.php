<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('festivals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('category')->nullable();
            $table->string('region')->nullable();
            $table->string('deity')->nullable();
            $table->text('significance')->nullable();
            $table->text('celebration_method')->nullable();
            $table->json('customs_and_rituals')->nullable();
            $table->json('special_foods')->nullable();
            $table->json('required_items')->nullable();
            $table->text('related_stories')->nullable();
            $table->date('date')->nullable();
            $table->string('duration')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('gallery')->nullable();
            $table->boolean('is_major')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('festivals');
    }
}; 