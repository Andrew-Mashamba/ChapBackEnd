<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->double('price');
            $table->string('image_url');
            $table->integer('category_id');
            $table->integer('popularity_score')->default(0);
            $table->integer('monthly_views')->default(0);
            $table->integer('monthly_sales')->default(0);
            $table->double('monthly_revenue')->default(0.0);
            $table->dateTime('last_viewed_at')->nullable();
            $table->dateTime('last_sold_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
