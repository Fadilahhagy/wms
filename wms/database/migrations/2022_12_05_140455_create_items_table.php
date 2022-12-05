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
        Schema::create('items', function (Blueprint $table) {
            $table->string('item_code',255)->primary();
            $table->string('name', 255);
            $table->string('exp_date', 100);
            $table->unsignedInteger('condition');
            $table->string('room_id',255);

            $table->foreignId('type_item_id')->constrained('item_types');
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->foreign('room_id')->references('room_code')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
