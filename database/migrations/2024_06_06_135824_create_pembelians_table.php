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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->string('kd_pembelian')->unique();
            $table->date('tanggal');
            $table->string('nama_barang');
            $table->string('nama_supplier');
            $table->integer('quantity');
            $table->string('satuan');
            $table->integer('harga');
            $table->integer('status_manager');
            $table->date('date_manager')->nullable();
            $table->integer('status_finance');
            $table->string('bukti_beli')->nullable();
            $table->date('date_finance')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('pembelians');
    }
};
