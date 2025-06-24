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
        Schema::create('therapists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('practitioner_id')->constrained('users')->cascadeOnDelete();
            $table->string('degree')->nullable();
            $table->text('short_description')->nullable();
            $table->string('website')->nullable();
            $table->string('referred_by')->nullable();
            $table->string('key_details')->nullable();
            $table->longText('about')->nullable();
            $table->longText('experience')->nullable();
            $table->decimal('fees')->nullable();
            $table->longText('availability')->nullable();
            $table->longText('further_information')->nullable();
            $table->json('online_platforms')->nullable();
            $table->text('tags')->nullable();
            $table->longText('health_insurance_providers')->nullable();
            $table->foreignId('membership_id')->nullable();
            $table->date('membership_expire')->nullable();
            $table->string('membership_type')->nullable();
            $table->string('member_id')->nullable();
            $table->date('membership_start_date')->nullable();
            $table->string('latitude_address')->nullable();
            $table->string('longitude_address')->nullable();
            $table->string('video')->nullable();
            $table->json('documents')->nullable();
            $table->boolean('hide_profile')->default(false);
            $table->enum('status', ['review', 'under review', 'approved', 'rejected'])->default('review');
            $table->boolean('registered')->default(false);
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
        Schema::dropIfExists('therapists');
    }
};
