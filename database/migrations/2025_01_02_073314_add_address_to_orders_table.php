<?php

// database/migrations/xxxx_xx_xx_add_address_to_orders_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Add address fields
            $table->string('shipping_name')->after('payment_id');
            $table->string('shipping_address')->after('shipping_name');
            $table->string('shipping_city')->after('shipping_address');
            $table->string('shipping_state')->after('shipping_city');
            $table->string('shipping_zip')->after('shipping_state');
            $table->string('shipping_country')->after('shipping_zip');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop the added address fields
            $table->dropColumn([
                'shipping_name',
                'shipping_address',
                'shipping_city',
                'shipping_state',
                'shipping_zip',
                'shipping_country',
            ]);
        });
    }
}