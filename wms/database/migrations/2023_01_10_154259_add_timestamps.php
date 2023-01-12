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
        Schema::table('room_types', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('suppliers', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('item_types', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('item_room_types', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('items', function (Blueprint $table) {
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
        //
    }
};
