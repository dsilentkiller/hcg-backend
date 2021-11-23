<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->nullable()->default('text');
            $table->string('top_heading');
            $table->text('slug');

            $table->text('meta_keywords')->nullable()->default('text');

            $table->integer('created_by')->unsigned()->nullable()->default(12);

            $table->string('image', 100)->nullable();

            $table->text('title_tag')->nullable()->default('text');


            $table->text('meta_description')->nullable()->default('text');

            $table->longText('description')->nullable()->default('text');
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
        Schema::dropIfExists('categories');
    }
}
