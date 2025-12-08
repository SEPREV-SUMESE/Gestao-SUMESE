<?php

use App\Types\DocumentTypes;
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
        Schema::create('socio_educating_documents', function (Blueprint $table) {
            $table->id();
            $table->enum('type', DocumentTypes::SOCIOEDUCATING_DOCUMENTS);

            $table->foreignId('document_id')->constrained('documents')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('socio_educating_id')->constrained('socio_educatings')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('entrance_id')->constrained('entrances')->nullOnDelete()->cascadeOnUpdate();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socio_educating_documents');
    }
};
