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
    Schema::table('wishlists', function (Blueprint $table) {
        $table->string('unit')->nullable()->after('price');
    });
}

public function down()
{
    Schema::table('wishlists', function (Blueprint $table) {
        $table->dropColumn('unit');
    });
}

};