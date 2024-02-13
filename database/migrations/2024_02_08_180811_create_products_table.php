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
            $table->string('title');
            $table->string('slug')->nullable();
            $table->foreignId('category_id');
            $table->foreignId('subcategory_id');
            $table->foreignId('brand_id')->nullable();
            $table->foreignId('unit_id')->nullable();
            $table->text('size')->nullable();
            $table->text('color')->nullable();
            $table->string('condition')->nullable();
            $table->text('regular_price')->nullable();
            $table->text('selling_price')->nullable();
            $table->string('code')->nullable();
            $table->string('stock_amount')->nullable();
            $table->text('sort_description')->nullable();
            $table->longText('detail')->nullable();
            $table->longText('more_detail')->nullable();
            $table->text('image')->nullable();
            $table->tinyInteger('status')->default(2);
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
