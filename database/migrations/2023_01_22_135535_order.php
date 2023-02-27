<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); //PK
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('product_name');
            $table->string('img_path')->nullable();
            $table->text('product_desc'); //deskripsi ada fasilitas
            $table->decimal('price', 10, 2);
            $table->time('time')->nullable();
            $table->date('date')->nullable();
            $table->string('place');
            $table->enum('status', ['wait', 'process', 'accept', 'decline'])->nullable(); //status pesanan
            $table->string('nama_nelayan')->nullable();
            $table->string('method')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
