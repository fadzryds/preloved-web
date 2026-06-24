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
        Schema::create('orders', function (Blueprint $table) {

            $table->id();
        
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();
        
            $table->string('order_number')->unique();
        
            $table->string('full_name');
        
            $table->string('phone');
        
            $table->text('address');
        
            $table->string('city');
        
            $table->string('postal_code');
        
            $table->string('payment_method');
        
            $table->integer('subtotal');
        
            $table->integer('shipping_fee');
        
            $table->integer('discount')->default(0);
        
            $table->integer('total');
        
            $table->enum('status', [
                'pending',
                'paid',
                'shipped',
                'completed',
                'cancelled'
            ])->default('pending');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
