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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('author_id')->nullable();
            $table->foreignId('category_id');
            $table->foreignId('subcategory_id')->nullable();
            $table->foreignId('reporter_id')->nullable();
            $table->text('title');
            $table->text('slug')->nullable();
            $table->text('sub_title')->nullable();
            $table->longText('body')->nullable();
            $table->string('image')->nullable();
            $table->string('image_caption')->nullable();
            $table->tinyInteger('slider_news')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_image')->nullable();
            $table->text('keywords')->nullable();
            $table->string('updated_date', 100)->nullable();
            $table->text('short_content')->nullable();
            $table->text('mid_content')->nullable();
            $table->integer('view_count')->default(0);
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
        Schema::dropIfExists('posts');
    }
};
