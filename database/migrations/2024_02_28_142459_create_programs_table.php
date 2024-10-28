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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('edulevel_id')->unsigned();//jadikan foreign key
            $table->foreignId('edulevel_id')->constrained('edulevels')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name', 100);
            $table->integer('student_price')->nullable();
            $table->tinyInteger('student_max')->nullable();
            $table->text('info')->nullable();
            $table->timestamps();
        });

        // Schema::table('programs', function (Blueprint $table) {
        //     $table->foreign('edulevel_id')->references('id')->on('edulevels')
        //     ->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
