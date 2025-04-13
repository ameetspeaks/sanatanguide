<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('temples', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('deity');
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('India');
            $table->text('history')->nullable();
            $table->text('significance')->nullable();
            $table->string('location')->nullable();
            $table->string('pincode')->nullable();
            $table->string('address')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->time('opening_time')->nullable();
            $table->time('closing_time')->nullable();
            $table->text('architecture')->nullable();
            $table->text('how_to_reach')->nullable();
            $table->text('accommodation')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->json('special_timings')->nullable();
            $table->json('festivals')->nullable();
            $table->json('rules')->nullable();
            $table->json('facilities')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('gallery')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('temples');
    }
}; 