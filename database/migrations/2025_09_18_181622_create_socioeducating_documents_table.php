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
    Schema::create('socioeducating_documents', function (Blueprint $table) {
        $table->id();
        $table->foreignId('socioeducating_id')->constrained('socioeducating')->onDelete('cascade');
        // uploads
        $table->string('cnj_guide_path')->nullable();
        $table->string('mp_representation_path')->nullable();
        $table->string('judicial_decision_path')->nullable();
        $table->string('personal_doc_path')->nullable();
        $table->string('forensic_exam_path')->nullable();
        // dados jurídicos
        $table->string('detention_unit')->nullable();
        $table->string('county')->nullable();
        $table->string('applied_measure')->nullable();
        $table->date('decision_date')->nullable();
        $table->date('entry_date')->nullable();
        $table->text('notes')->nullable();
        $table->string('process_number')->nullable();
        $table->string('execution_process_number')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socioeducating_documents');
    }
};
