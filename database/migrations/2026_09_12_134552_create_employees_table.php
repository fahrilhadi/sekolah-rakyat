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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('user_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();
            $table->string('employee_number');
            $table->string('full_name');
            $table->enum('gender', [
                'male',
                'female',
            ]);
            $table->string('birth_place')
                ->nullable();
            $table->date('birth_date')
                ->nullable();
            $table->string('phone', 30)
                ->nullable();
            $table->text('address')
                ->nullable();
            $table->string('photo_path')
                ->nullable();
            $table->string('employment_status')
                ->default('active');
            $table->date('joined_at')
                ->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique([
                'school_id',
                'employee_number',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
