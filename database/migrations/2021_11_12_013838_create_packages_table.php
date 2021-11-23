<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('created_by')->unsigned()->nullable()->default(12);

            $table->string('name', 100)->nullable()->default('text');

            $table->bigInteger('package_category_id')->nullable()->default(12);

            $table->integer('start_from')->unsigned()->nullable()->default(12);

            $table->longText('summary')->nullable()->default('text');

            $table->string('thumbnail', 100)->nullable()->default('text');

            $table->text('title_tag')->nullable()->default('text');

            $table->text('meta_keywords')->nullable()->default('text');

            $table->text('meta_description')->nullable()->default('text');

            $table->string('slug', 100)->nullable()->default('text');
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
        Schema::dropIfExists('packages');
    }
}
