<?php

use App\Models\Order;
use App\Models\PaymentGateway;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class AddDefaultGateways extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $paypal = PaymentGateway::where('name', 'PayPal_Express')->first();

        //Log::info('Removing?');
        if ($paypal) {
            // Set the Paypal gateway relationship to null to avoid errors when removing it
            Order::where('payment_gateway_id', $paypal->id)->update(['payment_gateway_id' => null]);
            Log::info('Removed');

            $paypal->delete();
        }

        Schema::table('payment_gateways', function ($table) {
            $table->boolean('default')->default(0);
            $table->string('admin_blade_template', 150)->default('');
            $table->string('checkout_blade_template', 150)->default('');
        });

        Schema::table('orders', function ($table) {
            $table->string('payment_intent', 150)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}