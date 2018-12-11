<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRssFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rss_feeds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rss_provider_id');
            $table->unsignedInteger('rss_category_id');
            $table->string('feed_url')->unique();

            $table->foreign('rss_provider_id')->references('id')->on('rss_providers');
            $table->foreign('rss_category_id')->references('id')->on('rss_categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rss_categories');
    }
}
