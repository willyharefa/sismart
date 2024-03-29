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
        Schema::create('konsumens', function (Blueprint $table) {
            $table->id();
            $table->string('name_company');
            $table->string('type_company');
            $table->string('npwp');
            $table->string('contact_number');
            $table->string('contact_manager');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->foreignId('branch_id')->constrained()->onUpdate('cascade')->onDelete('cascade');

            //$table->foreignId('konsumen_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->text('desc_company');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsumens');
    }
};
