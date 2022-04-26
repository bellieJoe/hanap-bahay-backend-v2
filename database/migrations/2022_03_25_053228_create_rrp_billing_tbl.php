<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrp_billing_tbl', function (Blueprint $table) {
            $table->id('Bill_ID');
            $table->uuid('ID');
            $table->foreignId('Tenant_ID');
            $table->foreignId('RRP_ID');
            $table->string('Status');
            $table->double('Amount_Paid');
            $table->json('Payment_Breakdown');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rrp_billing_tbl');
    }
};
