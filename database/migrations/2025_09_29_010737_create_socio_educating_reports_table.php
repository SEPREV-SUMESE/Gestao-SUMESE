<?php

use App\Types\SocioEducatingReportTypes;
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
        Schema::create('socio_educating_reports', function (Blueprint $table) {
            $table->id();
            $table->enum('type', SocioEducatingReportTypes::TYPES);
            $table->timestamp('date');
            $table->text('description');

            $table->foreignId('socio_educating_id')->constrained('socio_educatings')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('center_id')->constrained('centers')->nullOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socio_educating_reports');
    }
};
