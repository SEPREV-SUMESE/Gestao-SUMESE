<?php

use App\Types\ProcessTypes;
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
        Schema::create('socio_educating_processes', function (Blueprint $table) {
            $table->id();
            $table->string('number', 55);
            $table->enum('type', ProcessTypes::SOCIOEDUCATING_PROCESSES_TYPES);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socio_educating_processes');
    }
};
