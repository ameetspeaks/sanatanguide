<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('panchangs', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->string('tithi_number');
            $table->string('tithi_name');
            $table->string('tithi_end');
            $table->string('nakshatra');
            $table->string('nakshatra_end');
            $table->string('yoga');
            $table->string('yoga_end');
            $table->string('sunrise');
            $table->string('sunset');
            $table->string('moon_sign');
            $table->string('moon_phase');
            $table->string('rahu_kaal');
            $table->string('yamaganda');
            $table->string('gulika');
            $table->string('brahma_muhurta');
            $table->string('abhijit');
            $table->string('godhuli');
            $table->string('vijaya');
            $table->string('samvat');
            $table->string('masa');
            $table->string('paksha');
            $table->json('festivals')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panchangs');
    }
};
