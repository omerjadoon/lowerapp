<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->text('ad_slug');
            $table->bigInteger('seller_id')->unsigned();
            $table->foreign('seller_id')->references('id')->on('seller_details')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->text('desc');
            $table->bigInteger('day_count')->default(0);
            $table->float('actual_price');
            $table->float('price_range');
            $table->float('dec_percent')->default(5.00);
            $table->float('lower_selling_price');
            $table->float('total_decrement_amount')->default(0.00);
            $table->text('cover_file_name');
            $table->text('cover_file_path');
            $table->string('cover_file_extension');
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('ads');
    }
}
