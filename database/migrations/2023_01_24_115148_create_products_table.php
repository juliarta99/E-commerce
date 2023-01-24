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
            $table->string('slug')->unique();
            $table->string('name');
            $table->integer('harga');
            $table->integer('harga_awal')->nullable();
            $table->text('deskripsi');
            $table->string('image')->nullable();
            $table->float('rate')->default(0.0);
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->bigInteger('terjual')->default(0);
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
