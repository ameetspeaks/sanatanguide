<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('panchang', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->string('tithi');
            $table->string('nakshatra');
            $table->string('yoga');
            $table->string('karana');
            $table->time('sunrise');
            $table->time('sunset');
            $table->time('moonrise');
            $table->time('moonset');
            $table->string('rahukalam');
            $table->string('yamagandam');
            $table->string('gulikakalam');
            $table->string('abhyudayam');
            $table->string('amritakalam');
            $table->string('brahmamuhurta');
            $table->json('auspicious_timings')->nullable();
            $table->json('inauspicious_timings')->nullable();
            $table->json('festivals')->nullable();
            $table->json('special_events')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('panchang');
    }
}; 