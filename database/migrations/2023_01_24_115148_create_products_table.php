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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori');
            $table->foreignId('id_toko');
            $table->string('slug')->unique();
            $table->string('name');
            $table->integer('stok')->default(0);
            $table->double('harga');
            $table->double('harga_awal');
            $table->double('potongan')->default(0);
            $table->integer('diskon')->default(0);
            $table->integer('berat');
            $table->text('deskripsi');
            $table->string('image');
            $table->bigInteger('terjual')->default(0);
            $table->boolean('show')->default(1);
            $table->boolean('approve')->default(1);
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
        Schema::dropIfExists('products');
    }
};
