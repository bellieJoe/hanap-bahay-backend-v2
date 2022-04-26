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
        Schema::table('rrp_billing_tbl', function (Blueprint $table) {
            //
            $table->string("Email")->nullable();
            $table->string("Fullname")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rrp_billing_tbl', function (Blueprint $table) {
            //
        });
    }
};
