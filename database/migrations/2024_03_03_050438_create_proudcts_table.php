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
        Schema::create('proudcts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId("user_id")->constrained()->onUpdate('cascade')->onDelete('cascade');
             $table->string("title",255);
            $table->text("desc");
            $table->decimal("price",8,2);
            $table->string("image",255)->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proudcts');
    }
};
