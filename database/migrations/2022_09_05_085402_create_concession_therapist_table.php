<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concession_therapist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('concession_id')->constrained('concessions')->cascadeOnDelete();
            $table->foreignId('therapist_id')->constrained('therapists')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concession_therapist');
    }
};
