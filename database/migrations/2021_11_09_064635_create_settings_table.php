<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     */

    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email')->unique();
            $table->string('close_day')->defult('saturday');
            $table->string('open_day')->nullable();
            $table->string('open_time')->defult('10am');
            $table->string('close_time')->defult('5pm');
            $table->bigInteger('contact_no')->unique();
            $table->string('logo');
            $table->string('icon');
            $table->longText('location')->nullable();
            $table->string('title_tag');
            // $table->longText('summary')->nullable();
            // $table->longText('description')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            // $table->bigInteger('updated_)by');
            $table->string('twitter_link')->default('https://twitter.com/');
            $table->string('linkdlin_link')->default('https://linkdlin.com/');
            $table->string('instagram_link')->default('https://instagram.com/');
            $table->string('facebook_link')->default('https://facebook.com/');
            // $table->string('youtube_link');
            $table->integer('updated_by')->nullable();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
