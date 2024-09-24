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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('total_price')->default(0);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->timestamp('check_in');
            $table->timestamp('check_out');
            $table->foreignId('user_id')
                  ->constrained('users', 'id')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table)
        {
            $table->dropForeign('users_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('reservations');
    }
};
