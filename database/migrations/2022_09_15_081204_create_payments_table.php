<?php

use App\Models\Payment;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('relation_id')->nullable();
            $table->unsignedBigInteger('user_id')->constrained('users');
            $table->decimal('subtotal');
            $table->decimal('discount');
            $table->decimal('total');
            $table->enum('method', Payment::METHOD);
            $table->enum('for', [Payment::FOR_ORDER, Payment::FOR_ENROLL, Payment::FOR_BOOKING]);
            $table->string('btc_wallet')->nullable();
            $table->string('trx')->nullable();
            $table->enum('status', ['pending', 'success', 'cancel'])->default('pending');
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
        Schema::dropIfExists('payments');
    }
};
