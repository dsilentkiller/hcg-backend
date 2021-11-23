<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');

            $table->integer('created_by')->unsigned()->nullable()->default(12);

            $table->integer('category_id')->unsigned()->nullable()->default(12);

            $table->text('summary')->nullable()->default('text');

            $table->longText('description')->nullable()->default('text');

            $table->text('title_tag')->nullable()->default('text');


            $table->text('meta_keywords')->nullable()->default('text');


            $table->longText('meta_description')->nullable()->default('text');

            $table->string('image', 100)->nullable()->default('text');
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
        Schema::dropIfExists('package_categories');
    }
}
