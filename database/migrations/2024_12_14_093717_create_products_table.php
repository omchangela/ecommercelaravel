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
        // Create products table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            
            // Allow category_id to be nullable
            $table->foreignId('category_id')
                ->nullable() // Allows category_id to be NULL
                ->constrained('categories') // Assumes you have a 'categories' table
                ->onDelete('set null'); // Set category_id to NULL if category is deleted
            
            $table->decimal('rate', 3, 2)->default(0); // e.g., 4.5
            $table->unsignedInteger('review_count')->default(0); // e.g., 2947

            // New column for storing multiple images as JSON
            $table->json('multiple_images')->nullable(); // Allows storing multiple image paths/URLs in JSON format

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop products table
        Schema::dropIfExists('products');
    }
};
