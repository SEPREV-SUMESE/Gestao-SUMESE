<?php

use App\Types\SocioEducatingCentersHistoryTypes;
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
        Schema::create('socio_educating_centers_histories', function (Blueprint $table) {
            $table->id();
            $table->timestamp('request_date');
            $table->enum('request_status', SocioEducatingCentersHistoryTypes::REQUEST_STATUS_TYPES);
            $table->json('motives');
            $table->text('technical_report')->nullable();
            $table->text('observations')->nullable();

            $table->foreignId('initial_center_id')->constrained('centers')->cascadeOnUpdate();
            $table->foreignId('final_center_id')->constrained('centers')->cascadeOnUpdate();
            $table->foreignId('socio_educating_id')->constrained('socio_educatings')->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socio_educating_centers_histories');
    }
};
