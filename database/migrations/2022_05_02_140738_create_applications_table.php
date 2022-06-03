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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',128);
            $table->string('lastname', 128);
            $table->string('address', 255);
            $table->string('address_nb', 32);
            $table->string('city', 128);
            $table->string('zip', 6);
            $table->string('email', 255)->unique();
            $table->string('phone', 32);
            $table->string('img_receipt', 255);
            $table->string('img_ean_1', 255);
            $table->boolean('is_product_2')->default(false);
            $table->string('img_ean_2', 255)->nullable();
            $table->string('where_other', 255)->nullable();
            $table->boolean('legal_1')->default(true);
            $table->boolean('legal_2')->default(true);
            $table->boolean('legal_3');
            $table->boolean('legal_4');

            $table->timestamps();

            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('product_1_id');
            $table->unsignedBigInteger('product_2_id')->nullable();
            $table->unsignedBigInteger('whence_id');
            $table->unsignedBigInteger('type_shop_id');

            $table->foreign('shop_id')->references('id')->on('shops')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('whence_id')->references('id')->on('whences')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('type_shop_id')->references('id')->on('type_shops')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('product_1_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('product_2_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
