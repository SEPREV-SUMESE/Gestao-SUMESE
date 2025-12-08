<?php

use App\Types\EntranceTypes;
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
        Schema::create('entrances', function (Blueprint $table) {
            $table->id();
            $table->enum('correctional_measures', EntranceTypes::CORRECTIONAL_MEASURES);
            $table->timestamp('entrance_date');
            $table->timestamp('decision_date');
            $table->text('observations');
            $table->enum('status', EntranceTypes::STATUS);
            $table->string('shutdown_jurisdiction', 255)->nullable();
            $table->string('shutdown_technician', 55)->nullable();

            $table->foreignId('socio_educating_id')->constrained('socio_educatings')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrances');
    }
};
