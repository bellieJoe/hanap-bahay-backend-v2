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
        Schema::create('rrp_type_tbl', function (Blueprint $table) {
            $table->id('RRP_Type_ID');
            $table->foreignId('RRP_ID');
            $table->double('Basic_Rent');
            $table->string('RRP_Type');
            $table->string('Capacity');
            $table->string('Description')->nullable();
            $table->json('Miscellaneous');
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
        Schema::dropIfExists('rrp_type_tbl');
    }
};
