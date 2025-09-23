<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('socioeducating', function (Blueprint $table) {
            $table->id();
            $table->string('photo_path')->nullable(); // FOTO
            $table->string('full_name');
            $table->string('social_name')->nullable();
            $table->date('birth_date');
            $table->string('document_id');
            $table->string('education')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('gender_identity')->nullable();
            $table->string('sexual_orientation')->nullable();
            $table->string('race')->nullable();
            $table->decimal('weight_kg',5,2)->nullable();
            $table->decimal('height_cm',5,2)->nullable();
            $table->decimal('bmi',5,2)->nullable();
            $table->text('address')->nullable();
            $table->text('guardians')->nullable();
            $table->string('contact')->nullable();
            $table->enum('status', ['0', '1'])->default('1'); // <- status
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('socioeducating');
    }
};
