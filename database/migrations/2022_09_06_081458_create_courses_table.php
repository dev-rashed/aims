<?php

use App\Models\Course;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('counsellor_id')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->string('image');
            $table->longText('description');
            $table->string('duration');
            $table->integer('total_class');
            $table->decimal('price');
            $table->text('tags')->nullable();
            $table->enum('type', [Course::TYPE_ONLINE, Course::TYPE_ADVANCED]);
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
        Schema::dropIfExists('courses');
    }
};
