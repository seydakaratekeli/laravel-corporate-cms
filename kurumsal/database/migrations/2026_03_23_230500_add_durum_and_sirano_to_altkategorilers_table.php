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
        Schema::table('altkategorilers', function (Blueprint $table) {
            if (!Schema::hasColumn('altkategorilers', 'durum')) {
                $table->boolean('durum')->default(1);
            }

            if (!Schema::hasColumn('altkategorilers', 'sirano')) {
                $table->integer('sirano')->default(1)->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('altkategorilers', function (Blueprint $table) {
            if (Schema::hasColumn('altkategorilers', 'durum')) {
                $table->dropColumn('durum');
            }

            if (Schema::hasColumn('altkategorilers', 'sirano')) {
                $table->dropColumn('sirano');
            }
        });
    }
};
