<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Types\SocioEducatingTypes;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('socio_educatings', function (Blueprint $table) {
            $table->id();
            $table->string('social_name', 255)->nullable();
            $table->string('nickname', 255)->nullable();
            $table->timestamp('birthdate');
            $table->string('identifier', 55);
            $table->enum('marital_status', SocioEducatingTypes::MARITAL_STATUS);
            $table->enum('gender_identity', SocioEducatingTypes::GENDER_IDENTITY);
            $table->enum('sexual_orientation', SocioEducatingTypes::SEXUAL_ORIENTATION);
            $table->enum('race', SocioEducatingTypes::RACE);
            $table->enum('education_level', SocioEducatingTypes::EDUCATION_LEVEL);
            $table->float('weight');
            $table->float('height');
            $table->float('BMI');
            $table->string('address', 255);
            $table->string('birth_state', 3);
            $table->string('birth_city', 55);
            $table->string('father_name', 55);
            $table->string('mother_name', 55);
            $table->string('phone', 55);
            $table->string('secondary_phone', 55);
            $table->enum('status', SocioEducatingTypes::STATUS);

            $table->string('avatar', 55)->nullable();
            $table->integer('children')->default(0);
            $table->boolean('has_tatoos')->default(false);
            $table->boolean('has_banking_account')->default(false);
            $table->boolean('has_corrective_lenses')->default(false);
            $table->boolean('needs_special_care')->default(false);
            $table->boolean('has_scars')->default(false);


            $table->foreignId('center_id')->nullable()->constrained('centers')->nullOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socio_educatings');
    }
};
