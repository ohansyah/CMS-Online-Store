<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotDeals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hot_deals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->string('image')->nullable();
            $table->enum('type', ['product-list', 'product-category'])->default('product-category')->index();
            $table->json('data')->nullable();
            /**
            json data product-list: {
            "product_ids": [1,2,3,4,5],
            "button_text": "Shop Now",
            "button_link": "https://www.google.com"
            }
            json data product-category: {
            "category_id": 1,
            "product_total": 4,
            "button_text": "Shop Now",
            }
             */
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hot_deals');
    }
}
