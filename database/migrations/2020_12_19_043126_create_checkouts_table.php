<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->float('discount')->nullable();
            $table->integer('total_bill');
            $table->float('delivery_charge');
            $table->boolean('is_verified')->default(false);
            $table->string('verification_code')->nullable();
            $table->string('pay_type');
            $table->boolean('is_received')->default(false);
            $table->boolean('is_preparing')->default(false);
            $table->boolean('is_prepared')->default(false);
            $table->boolean('is_delivering')->default(false);
            $table->boolean('is_delivered')->default(false);
            $table->boolean('is_paid')->default(false);
            $table->timestamps();
        });

        Schema::create('checkout_order', function (Blueprint $table) {
            $table->foreignId('checkout_id')->constrained('checkouts')->cascadeOnDelete();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();

            $table->primary(['checkout_id', 'order_id']);

            $table->timestamps();
        });

        Schema::table('orders', function(Blueprint $table) {
            $table->foreignId('checkout_id')->nullable()->constrained('checkouts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}