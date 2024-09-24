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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('ingredients');
            $table->integer('price');
            $table->string('image');
            $table->foreignId('category_id')
                  ->constrained('dish_categories', 'id')
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
        Schema::dropIfExists('dishes');
        Schema::table('dishes', function (Blueprint $table)
        {
            $table->dropForeign('dish_categories_id_foreign');
            $table->dropColumn('category_id');
        });
    }
};
