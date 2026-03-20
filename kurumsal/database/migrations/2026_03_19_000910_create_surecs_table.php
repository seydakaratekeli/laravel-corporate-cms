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
        Schema::create('surecs', function (Blueprint $table) {
            $table->id();
            $table->string('surec')->nullsable();
            $table->string('baslik')->nullsable();
            $table->string('aciklama')->nullsable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surecs');
    }
};
