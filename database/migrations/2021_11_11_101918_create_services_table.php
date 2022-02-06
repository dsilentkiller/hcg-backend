<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 100)->nullable()->default('text');
            // $table->bigInteger('category_id')->nullable();
            $table->string('image', 100)->nullable()->default('text');
            $table->longText('description')->nullable()->default('text');
            $table->integer('created_by')->unsigned()->nullable()->default(12);
            $table->longText('summary');
            $table->longText('title_tag');
            $table->longText('meta_description');
            $table->longText('meta_keywords');
            $table->string('thumbnail');
            $table->string('slug')->nullable();
            $table->string('category_name')->nullable()->default('text');
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
        Schema::dropIfExists('services');
    }
}
