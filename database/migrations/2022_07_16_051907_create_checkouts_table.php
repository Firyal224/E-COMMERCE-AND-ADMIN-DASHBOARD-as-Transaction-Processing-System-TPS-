<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('kode_order');
            $table->string('nama_depan', 100);
            $table->string('nama_belakang', 100);
            $table->string('email', 100)->nullable();
            $table->text('alamat');
            $table->string('phone', 50);
            $table->string('negara', 100);
            $table->string('kota', 100);
            $table->string('provinsi', 100);
            $table->string('zipcode', 50);
            $table->string('bukti_bayar', 50)->nullable();
            $table->integer('payment');
            $table->integer('status')->nullable();
            $table->integer('total_harga_checkout');
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
        Schema::dropIfExists('checkouts');
    }
}
