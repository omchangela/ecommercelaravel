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
        // Create indepth_product_details table
        Schema::create('indepth_product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Foreign key to products table
            $table->string('image')->nullable(); // Additional product image
            $table->text('description')->nullable(); // Detailed description
            $table->timestamps();

            // Set up foreign key constraint
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade'); // Cascade delete indepth details if product is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop indepth_product_details table
        Schema::dropIfExists('indepth_product_details');
    }
};
