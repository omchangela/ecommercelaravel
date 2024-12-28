<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Relationship with Product
        $table->string('name');
        $table->string('email');
        $table->integer('rating')->default(0); // Rating out of 5
        $table->string('title');
        $table->text('message');
        $table->json('images')->nullable(); // Replace the single image field with this
        $table->integer('helpful_count')->default(0);
        $table->integer('not_helpful_count')->default(0);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('reviews');
}

};
