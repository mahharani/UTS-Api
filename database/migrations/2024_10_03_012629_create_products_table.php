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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('categories_id');
            $table->string('product');
            $table->text('descriction')->nullable();
            $table->double('price')->default(1);
            $table->integer('stock');
            $table->text('image');

            $table->timestamps();

             //relasi dari tabel products ke tabel categories
             $table->foreign('categories_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
