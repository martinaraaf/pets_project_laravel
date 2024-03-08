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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            // user_id, product_id, quantity
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("product_id");
            $table->tinyInteger("quantity");
            $table->timestamps();
            
            $table->foreign("user_id")->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("product_id")->references('id')->on('proudcts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
