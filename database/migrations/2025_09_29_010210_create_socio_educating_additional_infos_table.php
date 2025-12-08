<?php

use App\Types\SocioEducatingAdditionalInfoTypes;
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
        Schema::create('socio_educating_additional_infos', function (Blueprint $table) {
            $table->id();

            // Informações Escolares
            $table->string('school_name')->nullable();
            $table->enum('education_level', SocioEducatingAdditionalInfoTypes::EDUCATION_LEVEL); // Este pode ser duplicado, depois conversar para entender se é necessário
            $table->enum('education_status', SocioEducatingAdditionalInfoTypes::EDUCATION_STATUS);
            $table->enum('reading_writing_level', SocioEducatingAdditionalInfoTypes::MULTIPLE_LEVEL_QUESTIONS);
            $table->enum('interpretation', SocioEducatingAdditionalInfoTypes::MULTIPLE_LEVEL_QUESTIONS);
            $table->boolean('four_operations_ability');
            $table->enum('most_dificulty_operation', SocioEducatingAdditionalInfoTypes::OPERATIONS);
            $table->boolean('logical_thinking');

            // Informações Familiares
            $table->string('lives_with', 55);
            $table->enum('has_good_relationship', SocioEducatingAdditionalInfoTypes::MULTIPLE_LEVEL_QUESTIONS);
            $table->text('has_good_relationship_description')->nullable();
            $table->boolean('religious_group');
            $table->boolean('religious_practitioner');
            $table->string('religion', 55)->nullable();

            // Informações sobre Interesses
            $table->boolean('has_professional_course');
            $table->string('course', 55)->nullable();
            $table->string('matching_activity', 255)->nullable();

            $table->foreignId('socio_educating_id')->constrained('socio_educatings')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socio_educating_additional_infos');
    }
};
