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
        Schema::create('type_actions', function (Blueprint $table) {
            $table->id();
            $table->string('name_action');
            $table->text('detail_action');
            $table->enum('status_action', ['Prospect', 'Hot Prospect']);
            $table->enum('priority_action',['prospect','hot-prospect', 'loss-prospect', 'final-prospect']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_actions');
    }
};
