<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table -> foreign('brand_id')
                   -> references('id')
                   -> on('brands');
        });

        Schema::table('car_pilot', function (Blueprint $table) {
            $table -> foreign('car_id')
                   -> references('id')
                   -> on('cars')
                   -> onDelete('cascade');
            $table -> foreign('pilot_id')
                   -> references('id')
                   -> on('pilots')
                   -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table -> dropForeign(['brand_id']);
        });
        
        Schema::table('car_pilot', function (Blueprint $table) {
            $table -> dropForeign(['car_id']);
            $table -> dropForeign(['pilot_id']);
        });
    }
}
