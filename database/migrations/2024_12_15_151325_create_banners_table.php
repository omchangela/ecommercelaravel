<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('text_input_1')->nullable(); // Text input 1
            $table->string('text_input_2')->nullable(); // Text input 2
            $table->string('text_input_3')->nullable(); // Text input 3
            $table->string('image'); // Path to banner image
            
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
