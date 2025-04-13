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
        Schema::table('pujas', function (Blueprint $table) {
            // Make price nullable
            $table->decimal('price', 10, 2)->nullable()->change();
            
            // Make duration nullable
            $table->string('duration')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pujas', function (Blueprint $table) {
            // Revert price to not nullable
            $table->decimal('price', 10, 2)->change();
            
            // Revert duration to not nullable
            $table->string('duration')->change();
        });
    }
}; 