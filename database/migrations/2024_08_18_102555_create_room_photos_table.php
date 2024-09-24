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
        Schema::create('room_photos', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->foreignId('room_id')
                  ->constrained('rooms', 'id')
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
        Schema::dropIfExists('room_photos');
        Schema::table('room_photos', function (Blueprint $table)
        {
            $table->dropForeign('rooms_id_foreign');
            $table->dropColumn('room_id');
        });
    }
};
