<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstagramShowcasesTable extends Migration
{
    public function up()
    {
        Schema::create('instagram_showcases', function (Blueprint $table) {
            $table->id();
            $table->string('image'); // Field for storing the image URL or file path
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('instagram_showcases');
    }
}
