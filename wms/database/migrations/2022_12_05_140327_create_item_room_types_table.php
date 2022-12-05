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
        Schema::create('item_room_types', function (Blueprint $table) {
            $table->string('room_code',255);
            $table->unsignedBigInteger('item_type_id');
            $table->unsignedInteger('capacity');

            $table->foreign('room_code')->references('room_code')->on('rooms')->onDelete('cascade');
            $table->foreign('item_type_id')->references('id')->on('item_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_room_types');
    }
};
