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
        Schema::table('rrp_tbl', function (Blueprint $table) {
            //
            $table->json('Rent_Breakdown')->nullable();
            $table->string('Business_Registration_No')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rrp_tbl', function (Blueprint $table) {
            //
        });
    }
};
