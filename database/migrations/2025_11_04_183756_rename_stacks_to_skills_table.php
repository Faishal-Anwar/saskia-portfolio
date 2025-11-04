<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('stacks', 'skills');
        Schema::rename('project_stack', 'experience_skill');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('skills', 'stacks');
        Schema::rename('experience_skill', 'project_stack');
    }
};