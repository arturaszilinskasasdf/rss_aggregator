<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRssFeedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rss_feed_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rss_feed_id');

            $table->string('title');
            $table->string('link');
            $table->text('description');
            $table->dateTime('date')->nullable();

            $table->foreign('rss_feed_id')->references('id')->on('rss_feeds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rss_feed_items');
    }
}
