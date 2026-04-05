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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('currency', 10)->nullable(); 
            $table->string('method')->nullable();
            $table->string('gateway')->nullable();
            $table->string('tran_id')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0: pending, 1: success, 2: failed');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
