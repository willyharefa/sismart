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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('cd_ticket')->unique();
            $table->foreignId('konsumen_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('phone_number');
            $table->string('name_pic');
            $table->foreignId('type_customer_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('type_service_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('sales_pic_a');
            $table->string('sales_pic_b');
            $table->string('sales_pic_c');
            $table->string('status');
            $table->string('desc_ticket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
