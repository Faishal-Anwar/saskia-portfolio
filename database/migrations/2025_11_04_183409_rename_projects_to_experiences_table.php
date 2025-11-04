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
        Schema::rename('projects', 'experiences');
        
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropColumn(['client', 'link', 'tech_stack', 'approach', 'vision', 'design', 'conclusion']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->string('client')->nullable();
            $table->string('link')->nullable();
            $table->text('tech_stack')->nullable();
            $table->text('approach')->nullable();
            $table->text('vision')->nullable();
            $table->text('design')->nullable();
            $table->text('conclusion')->nullable();
        });

        Schema::rename('experiences', 'projects');
    }
};
