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
        Schema::create('sub_areas_of_expertise', function (Blueprint $table) {
            $table->id();
            //foreign key to areas_of_expertise table
            $table->foreignId('area_of_expertise_id')
                ->constrained('areas_of_expertise')
                ->onDelete('cascade');
            $table->string('name')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_areas_of_expertise');
    }
};
