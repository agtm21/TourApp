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
            $table->id('id_order'); //PK
            $table->unsignedBigInteger('id_user');
            $table->string('product_name');
            $table->string('img_path')->nullable();
            $table->text('product_desc'); //deskripsi ada fasilitas
            $table->decimal('price', 10, 2);
            $table->time('time');
            $table->date('date');
            $table->string('place');
            $table->boolean('status')->default(1); //kalau pesanan dikonfirmasi maka selesai (0)
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
