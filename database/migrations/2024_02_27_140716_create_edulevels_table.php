<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * eksekusi table dangan php artisan migrate agar terbuat dibuat otomatis ke database mysql
     */
    public function up(): void
    {
        Schema::create('edulevels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('desc')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edulevels');
    }
};
