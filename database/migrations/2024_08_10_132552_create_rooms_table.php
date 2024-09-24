<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('beds_num');
            $table->integer('price');
            $table->text('description');
            $table->foreignId('category_id')
                  ->constrained('room_categories', 'id')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('reservation_id')
                  ->constrained('reservations', 'id')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
        Schema::table('rooms', function (Blueprint $table)
        {
            $table->dropForeign('rooms_categories_id_foreign');
            $table->dropColumn('category_id');
        });
        Schema::table('rooms', function (Blueprint $table)
        {
            $table->dropForeign('rooms_reservation_id_foreign');
            $table->dropColumn('reservation_id');
        });
    }
};
