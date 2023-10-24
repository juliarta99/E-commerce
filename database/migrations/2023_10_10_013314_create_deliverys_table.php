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
        Schema::create('deliverys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_transaksi');
            $table->foreignId('id_toko');
            $table->string('no_resi')->nullable();
            $table->string('origin_province');
            $table->string('origin_city');
            $table->integer('origin_postal_code');
            $table->string('destination_province');
            $table->string('destination_city');
            $table->integer('destination_postal_code');
            $table->string('destination_detail');
            $table->string('catatan')->nullable();
            $table->string('kurir');
            $table->string('service');
            $table->string('estimation');
            $table->double('cost');
            $table->dateTime('date_done')->nullable();
            $table->string('status')->default('authorize');
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
        Schema::dropIfExists('deliverys');
    }
};
