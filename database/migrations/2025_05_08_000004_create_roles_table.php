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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('status_id')->default(1)->constrained('statuses');
            $table->timestamps();
        });
    }

        public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
