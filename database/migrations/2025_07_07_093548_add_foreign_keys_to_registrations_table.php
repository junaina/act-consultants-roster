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
        Schema::table('registrations', function (Blueprint $table) {
            // Drop the old string columns
            $table->dropColumn('area_of_expertise');
            $table->dropColumn('sub_area_of_expertise');

            // Add new foreign key columns
            $table->foreignId('area_of_expertise_id')
                ->constrained('areas_of_expertise')
                ->onDelete('restrict');

            $table->foreignId('sub_area_of_expertise_id')
                ->constrained('sub_areas_of_expertise')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            // Drop the foreign keys and columns
            $table->dropForeign(['area_of_expertise_id']);
            $table->dropForeign(['sub_area_of_expertise_id']);
            $table->dropColumn('area_of_expertise_id');
            $table->dropColumn('sub_area_of_expertise_id');

            // Re-add the old string columns
            $table->string('area_of_expertise');
            $table->string('sub_area_of_expertise');
        });
    }
};
