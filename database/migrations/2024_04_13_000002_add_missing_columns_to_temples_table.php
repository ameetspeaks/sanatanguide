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
        Schema::table('temples', function (Blueprint $table) {
            $table->integer('darshan_duration')->nullable()->after('closing_time');
            $table->decimal('special_darshan_fee', 10, 2)->nullable()->after('darshan_duration');
            $table->text('dress_code')->nullable()->after('special_darshan_fee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('temples', function (Blueprint $table) {
            $table->dropColumn([
                'darshan_duration',
                'special_darshan_fee',
                'dress_code'
            ]);
        });
    }
}; 